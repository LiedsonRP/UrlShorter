<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    /**
    * Nome da tabela associada ao modelo.
    *
    * @var string
    */
    protected $table = 'url'; 

    /**
     * Indica se o modelo deve ter timestamp.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
    * Atributos que permitem atribuição em massa. 
    *
    * @var array
    */
    protected $fillable = [
        "created_at",
        "url", 
        "shortUrl",
        "expired_at"
    ];
}
