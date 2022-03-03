<?php

namespace App\Apiary\Asaas;

use Illuminate\Support\Facades\Http;

class Clients 
{
    public function createClient(array $data)
    {
        $response = Http::post($this->url . '/customers/', array_merge([
            'access_token' => $this->key,
        ], $data));

        return ['success' => $response->ok(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }

    public function listClients(array $filters=[])
    {
        $response = Http::get($this->url . '/customers', array_merge([
            'access_token' => $this->key,
        ],$filters));

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

    public function updateClient(string $id, array $newData)
    {      
        $response = Http::post($this->url . '/customers/', array_merge([
            'id' => $id,
            'access_token' => $this->key,
        ], $newData));

        return ['success' => $response->ok(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }

    public function removeClient(string $id)
    {
        // dd($this->url . "/customers/$id/");

        $response = Http::delete($this->url . '/customers', [
            'id' => $id,
            'access_token' => $this->key,
        ]);

        return ['success' => $response->ok(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }

    public function restoreClient(string $id)
    {
        $response = Http::post($this->url . "/customers/$id/restore", [
            'access_token' => $this->key,
        ]);

        return ['success' => $response->ok(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }
}