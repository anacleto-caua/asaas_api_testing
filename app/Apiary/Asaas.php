<?php

namespace App\Apiary;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Apiary\Asaas\Clients;

class Asaas extends Clients
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = env('asaas_url');
        $this->key = env('asaas_key');
    }

   
}
