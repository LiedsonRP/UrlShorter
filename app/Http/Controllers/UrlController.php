<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UrlServices;
use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class UrlController extends Controller
{    
    /**
     * Timezone padrão do sistema
     * @var string
     */
    const TIMEZONE = "America/Sao_Paulo";
    /**
     * Total de dias em o link é valido
     * @var int
     */
    const DAYS_VALID_LINK = 1;

    /**
     * Recebe uma URL e a encurta para o padrão estabelecido na aplicação,
     * em seguida a guardando no banco de dados.
     * 
     * @param Request $request
     * @param UrlServices $service
     * @param Carbon $dateTime
     */
    public function shortURL(Request $request, UrlServices $service, Carbon $dateTime) 
    {
        $request->validate([
            "url" => ["regex:/^(?:(?:(?:https?|ftp):)?\/\/)?(?:[\w-]+\.)+[a-zA-Z]{2,}(?::\d+)?(?:\/\S*)?$/"]
        ], [
            "url.regex" => "A URL passada não possui um formato válido!"
        ]);

        $url = $request->input("url");
        $creation_datetime = $dateTime->now(self::TIMEZONE);         
        $shortUrl = url("/".$service->generateShortURL($url));

        Url::create([
            "created_at" => $creation_datetime,
            "url" => $url,
            "shortUrl" => $shortUrl,
            "expired_at" => $creation_datetime->copy()->addDays(self::DAYS_VALID_LINK)
        ]);
        
        return redirect("/new-url")->with("shortUrl", $shortUrl);
    }

    /**
     * Pesquisa um shortUrl cadastrada na base de dados e caso a encontre,
     * e ela esteja ainda valida redireciona para o link original.
     * 
     * @param Request $request
     * @param Carbon $datetime 
     */
    public function redirect(Request $request, Carbon $dateTime) 
    {        
        try {

            Log::channel("laravel")->info($request->url());
            $link = Url::where("shortUrl", "LIKE", $request->url())->firstOrFail(); 
            
            $actual_datetime = $dateTime->now(self::TIMEZONE);
            $diffDays = $actual_datetime->diffInDays($link->expired_at);
            
            if ($diffDays < self::DAYS_VALID_LINK) {
                Log::channel("laravel")->info("redirecionando para ".$link->url);
                return redirect()->away($link->url);
            } else {
                return redirect("/error")->with("error", "Link expirado!");
            }

        } catch(ModelNotFoundException $ex) {
            Log::channel("laravel")->error($ex->getMessage());
            return redirect("/error")->with("error", "Link não encontrado!");
        }
    }
}
