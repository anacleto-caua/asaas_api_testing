<?php

namespace App\Http\Controllers;

use App\Apiary\Asaas;
use Illuminate\Http\Request;

class AsaasController extends Controller
{
    
    public function index(){
        $asaas = new Asaas();
        dd($asaas->updateClient('cus_000004811872', [
            "name" => "Marcelo Almeida",
            "phone"=> "4738010919",]));
        //Do something
    }
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
     */
}
