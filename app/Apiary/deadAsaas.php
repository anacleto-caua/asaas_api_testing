<?php

// namespace App\Apiary;

use Carbon\Carbon;
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

    //Payments funcionalities
    //Não sei qual formato usar para valores monetários
    public function createPayment(
        string $customer, //Id do cliente no Asaas
        string $billingType, //Forma de pagamento BOLETO|CREDIT_CARD|PIX|UNDEFINED
        float $value, //Valor a ser cobrado
        Carbon $dueDate, //Data de vencimento
        string $description, //
        string $externalReference = null, //Um id ou campo externo para busca
        int $installmentCount = null, //Número de parcelas //Apenas no caso do cliente querer parcelar
        float $installmentValue = null, //Valor por parcela //Apenas no caso do cliente querer parcelar
        object $discount = null,  //[value, dueDataDlimitDays, type[fixed ou percentage]]
        float $interest = 0, //Porcentagem de juros mensais após vencimento
        float $fine = 0, //Percentual de multa sobre o valor da cobrança para pagamento após o vencimento
        bool $postalService = false, // Define se aa cobrança será enviada via Correios
        array $split = null, //[string $walletId, number $fixedValue, number $percentualValue]
        )
    {
        $response = Http::post($this->url . '/payments', [
            'customer' => $customer,
            'billingType' => $billingType,
            'value' => $value,
            'dueDate' => $dueDate,
            'description' => $description,
            'externalReference' => $externalReference,
            'installmentCount' => $installmentCount,
            'installmentValue' => $installmentValue,
            'discount' => $discount,
            'interest' => $interest,
            'fine' => $fine,
            'postalService' => $postalService,
            'split' => $split,

            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];
    }

    public function listPayments(
        string $id = null,
        string $customer = null, //Id do cliente no Asaas
        string $billingType = null, //Forma de pagamento BOLETO|CREDIT_CARD|PIX|UNDEFINED
        float $value = null, //Valor a ser cobrado
        Carbon $dueDate = null, //Data de vencimento
        string $description = null, //
        string $externalReference = null, //Um id ou campo externo para busca
        int $installmentCount = null, //Número de parcelas //Apenas no caso do cliente querer parcelar
        float $installmentValue = null, //Valor por parcela //Apenas no caso do cliente querer parcelar
        object $discount = null,  //[value, dueDataDlimitDays, type[fixed ou percentage]]
        float $interest = null, //Porcentagem de juros mensais após vencimento
        float $fine = null, //Percentual de multa sobre o valor da cobrança para pagamento após o vencimento
        bool $postalService = null, // Define se aa cobrança será enviada via Correios
        array $split = null, //[string $walletId, number $fixedValue, number $percentualValue])
        )
    {
        $response = Http::get($this->url . '/payments', [
            'id' => $id,
            'customer' => $customer,
            'billingType' => $billingType,
            'value' => $value,
            'dueDate' => $dueDate,
            'description' => $description,
            'externalReference' => $externalReference,
            'installmentCount' => $installmentCount,
            'installmentValue' => $installmentValue,
            'discount' => $discount,
            'interest' => $interest,
            'fine' => $fine,
            'postalService' => $postalService,
            'split' => $split,

            'access_token' => $this->key,
        ]);

        return $response->collect()->toArray();
    }

    public function updatePayment($id)
    {
        $response = Http::post($this->url . '/payments', [
            'id' => $id,
            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];
    }

    public function removePayment($id)
    {
        $response = Http::delete($this->url . '/payments', [
            'id' => $id,
            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];
    }

    public function restorePayment($id)
    {
        $response = Http::post($this->url . "/payments/$id/restore", [
            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];
    }
    
    public function refundPayment($id)
    {
        $response = Http::post($this->url . "/payments/$id/refund", [
            'access_token' => $this->key,
        ]);

        return ['success' => $response->successful(), 'response' => $response];
    }

    public function getTicketId($id)
    {
        $response = Http::post($this->url . "/payments/$id/identificationField", [
            'access_token' => $this->key,
        ]);

        return $response->collect()->toArray();
    }

    public function generatePixQRCode($id)
    {
        $response = Http::get($this->url . "/payments/$id/pixQrCode", [
            'access_token' => $this->key,
        ]);

        //Precisa de processamento pra gerar a imagem
        return $response->collect();
    }

}