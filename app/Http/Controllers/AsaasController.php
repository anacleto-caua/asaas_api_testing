<?php

namespace App\Http\Controllers;

use App\Apiary\Asaas;
use Illuminate\Http\Request;

class AsaasController extends Controller
{
    
    public function index(){
        $asaas = new Asaas();
        dd($asaas->getClientById('cus_000004809894'));

    }
}
