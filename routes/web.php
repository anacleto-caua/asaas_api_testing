<?php

use App\Apiary\Asaas;
use App\Http\Controllers\Asaas\AssasUserController;
use App\Http\Controllers\AsaasController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\Assert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/console');
});

Route::get('/console', [AsaasController::class, 'index']);