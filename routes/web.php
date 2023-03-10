<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaquinaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;

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

//Esta rota leva-nos até ao controller de licença(Consulta Maquina com Licença)
Route::get("/",[MaquinaController::class,"page"])->name("queryMachine");

//Esta rota leva-nos até ao controller de auth
Route::get("login",[AuthController::class,"showLoginForm"])->name("login");

//Esta Rota leva ate ao formulario de login do Aluno(Secretaria-Online)
Route::get("aluno/login",[AuthController::class,"showLoginFormAluno"])->name("loginAluno");

//Esta rota leva os usuarios(Tecnicos ou Parceiros) aos seus formularios de pedido de Licenças
Route::get("license/resquestLicense",[LicenseController::class,"requestLicenseForm"])->name("requestLicenseForm");

//Esta rota leva-nos até ao controller de licença (Retorna Formulario de Licença)
Route::get("license",[MaquinaController::class,"showLicenseForm"])->name("license");

//Esta rota leva-nos ao metodo que processa o pedido de licenças
Route::post("/",[LicenseController::class,"requestLicense"])->name("requestLicense");

//Grupo de Rotas do Admin
Route::prefix("admin")->group(function(){
    Route::get("license", [AdminController::class,"licenseForm"])->name("license");
    Route::get("parceiros",[AdminController::class,"parceiroForm"])->name("parceiros");
    Route::get("cadastrar",[AdminController::class,"cadastrarForm"])->name("cadastrarParceiro");
    Route::post("cadastrar",[AdminController::class,"store"])->name("storeParceiro");
    //Route::post("cadastrar",[AdminController::class,"test"])->name("test");
});
