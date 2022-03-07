<?php

namespace App\Apiary\Asaas;

use Illuminate\Support\Facades\Http;

//Classe abstrata para acesso à API
class Asaas
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = env('asaas_url');
        $this->key = env('asaas_key');
    }

}