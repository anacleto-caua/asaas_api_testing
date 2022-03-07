<?php

namespace App\Http\Controllers;

use App\Apiary\Asaas\AsaasClient;

class AsaasController extends Controller
{
    
    public function index(){

        $asaas_client = new AsaasClient();
        $asaas_client->createClient('Ronaldo', '0000203123');
        //Do something
    }

    /**
     * -->Creat payment
     * dd($asaas->createPayment('cus_000004811872', 'BOLETO', 5.79, Carbon::now()->addMonth(1), 'Description'));
     * dd($asaas->createPayment('cus_000004811872', 'PIX', 5.79, Carbon::now()->addMonth(1), 'Description'));
     * 
     * -->List payments
     * dd($asaas->listPayments());
     * dd($asaas->listPayments(customer:'cus_000004811876'));
     * dd($asaas->listPayments(billingType:'PIX'));
     * 
     * -->Update payment
     * dd($asaas->updatePayment('pay_9637962509746066'));
     * 
     * -->Remove payment
     * dd($asaas->removePayment('pay_9637962509746066'));
     * 
     * -->Restore payment
     * dd($asaas->restorePayment('pay_9637962509746066'));
     * 
     * -->Refund payment
     * dd($asaas->refundPayment('pay_9637962509746066'));
     * 
     * -->Get ticket field id
     * 
    */

    /**
     * Sample Codes
     * 
     * -->Create Object
     * $asaas = new Asaas();
     * 
     * -->Create client
     * dd($asaas->createClient([
     * "name" => "Marcelo Almeida",
     * "email" => "marcelo.almeida@gmail.com",
     * "phone"=> "4738010919",
     * "mobilePhone" => "4799376637",
     * "cpfCnpj" => "24971563792",
     * "postalCode" => "01310-000",
     * "address" => "Av. Paulista",
     * "addressNumber" => "150",
     * "complement" => "Sala 201",
     * "province" => "Centro",
     * "externalReference" => "12987382",
     * "notificationDisabled" => false,
     * "additionalEmails" => "marcelo.almeida2@gmail.com,marcelo.almeida3@gmail.com",
     * "municipalInscription" => "46683695908",
     * "stateInscription" => "646681195275",
     * "observations" => "ótimo pagador, nenhum problema até o momento"]));
     * 
     * -->List clients
     * dd($asaas->listClients());
     * dd($asaas->listClients(['name' => 'Marcelo']));
     * 
     * -->Get client by id
     * dd($asaas->getClientById('cus_000004811872'));
     * 
     * -->Update client
     * dd($asaas->updateClient('cus_000004811872', [
     * "name" => "Marcelo Almeida",
     * "phone"=> "4738010919",]));
     * 
     * -->Delete client
     * dd($asaas->removeClient('cus_000004811872'));
     * 
     * ->Restore client
     * dd($asaas->restoreClient('cus_000004811872'));
     * 
     */
}