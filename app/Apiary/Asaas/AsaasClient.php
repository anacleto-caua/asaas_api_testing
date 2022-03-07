<?php

namespace App\Apiary\Asaas;

use Illuminate\Support\Facades\Http;

//Classe para acessar usuários na API 
class AsaasClient extends Asaas
{
    
    //Clients funcionalities
     public function createClient(
        string $name,
        string $cpfCpnj,
        string $email = null,
        string $phone = null,
        string $mobilePhone = null,
        string $address = null,
        string $complement = null,
        string $province = null,
        string $postalCode = null,
        string $externalReference = null,
        bool $notificationDisabled = null,
        string $addtionalEmails = null,
        string $municipalInscription = null,
        string $stateInscription = null,
        string $observations = null,
        string $groupName = null,
    )
    {
        $response = Http::post($this->url . '/customers',[
            'name' => $name,
            'cpfCpnj' => $cpfCpnj,
            'email' => $email,
            'phone' => $phone,
            'mobilePhone' => $mobilePhone,
            'address' => $address,
            'complement' => $complement,
            'province' => $province,
            'postalCode' => $postalCode,
            'externalReference' => $externalReference,
            'notificationDisabled' => $notificationDisabled,
            'addtionalEmails' => $addtionalEmails,
            'municipalInscription' => $municipalInscription,
            'stateInscription' => $stateInscription,
            'observations' => $observations,
            'groupName' => $groupName,

            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }

    public function listClients(
        string $name = null,
        string $cpfCpnj = null,
        string $email = null,
        string $phone = null,
        string $mobilePhone = null,
        string $address = null,
        string $complement = null,
        string $province = null,
        string $postalCode = null,
        string $externalReference = null,
        bool $notificationDisabled = null,
        string $addtionalEmails = null,
        string $municipalInscription = null,
        string $stateInscription = null,
        string $observations = null,
        string $groupName = null,)
    {
        $response = Http::get($this->url . '/customers', [
            'name' => $name,
            'cpfCpnj' => $cpfCpnj,
            'email' => $email,
            'phone' => $phone,
            'mobilePhone' => $mobilePhone,
            'address' => $address,
            'complement' => $complement,
            'province' => $province,
            'postalCode' => $postalCode,
            'externalReference' => $externalReference,
            'notificationDisabled' => $notificationDisabled,
            'addtionalEmails' => $addtionalEmails,
            'municipalInscription' => $municipalInscription,
            'stateInscription' => $stateInscription,
            'observations' => $observations,
            'groupName' => $groupName,

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

    public function updateClient(string $id, array $newData)
    {      
        $response = Http::post($this->url . '/customers/', array_merge([
            'id' => $id,
            'access_token' => $this->key,
        ], $newData));

        return ['success' => $response->successful(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }

    public function removeClient(string $id)
    {
        $response = Http::delete($this->url . '/customers', [
            'id' => $id,
            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }

    public function restoreClient(string $id)
    {
        $response = Http::post($this->url . "/customers/$id/restore", [
            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];//Claramente tem como melhorar e padronizar pra esse tipo de request que não retorna
    }
}