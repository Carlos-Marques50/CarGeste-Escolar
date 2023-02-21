<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LicencaController;

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


//Esta rota apresenta a pagina pricipal do sistema. 
Route::get("/",function(){
    return view("welcome");
})->name("welcome");

//Esta rota leva-nos até ao controller de auth
Route::get("login",[AuthController::class,"showLoginForm"])->name("login");

//Esta rota leva-nos até ao controller de licença
Route::get("licenca",[LicencaController::class,"showLicencaForm"])->name("licenca");

//Esta rota leva-nos até ao controller de licença
Route::post("licenca",[LicencaController::class,"activarlicenca"])->name("ActivarLicenca");
  
