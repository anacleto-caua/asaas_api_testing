<?php

namespace App\Apiary;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Asaas
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = env('asaas_url');
        $this->key = env('asaas_key');
    }

    //Função inútil?
    private function verifyResponse(Response $response, array|string $releaseOn = ['200'])
    {
        if(in_array($response->status(), $releaseOn)){
            return $response;
        };

        return 0;
    }

    public function listClients()
    {
        $response = Http::get($this->url . '/customers', [
            'access_token' => $this->key,
        ]);

        return $response->collect()->toArray()['data']; //Tem como melhorar essa linha?
    }

    public function getClientById(string $id)
    {
        $response = Http::get($this->url . '/customers/', [
            'id' => $id,
            'access_token' => $this->key,
        ]);

        return $response->collect()->toArray(); //Tem como melhorar essa linha?
    }
}
