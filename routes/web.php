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
    dd(0);
});

Route::get('/console', [AsaasController::class, 'index']);

//// Asaas Routes
// Route::name('asaas.')->group(function () {

//     // User
//     Route::controller(AssasUserController::class)->name('users.')->group(function() {

//         Route::get('assas/users/create/', 'create')->name('create');
        

//     });

// });