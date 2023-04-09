<?php

namespace App\Services;

class UrlServices 
{

    /**
    * Tamanho dos links encurtados
    * @var integer
    */
    const SHORTED_LINK_LENGHT = 5;

    /**
     * Lista de caracteres que não podem ser adicionados a URL
     * @var array
     */
    const BANNED_CHARACTERS = ['/','?'];

    /**
     * Método responsável por encurtar a URL, seguindo o padrão de que 
     * ela deve ser composta por 5 digitos
     * 
     * @param String $url
     * @return String
     */
    public function generateShortURL(String $url) 
    {
        $shortedUrl = "";
        $url_length =  strlen($url) - 1;
        
        while (strlen($shortedUrl) != self::SHORTED_LINK_LENGHT) {

            $letter_or_number =  rand(0, 1); // 0 = letra e 1 = número
        
            if ($letter_or_number == 0) {
                
                $randomCaracter_From_String = rand(0, $url_length);

                if (!in_array($randomCaracter_From_String, self::BANNED_CHARACTERS)) {
                    $shortedUrl = $shortedUrl.$url[$randomCaracter_From_String];
                } else {
                    continue;
                }

            } else {
                $randomNumber = rand(0,9);
                $shortedUrl = $shortedUrl.$randomNumber;
            }
    }    

        return $shortedUrl;
    }
}