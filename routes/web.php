<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaquinaController;
use Illuminate\Support\Facades\Route;

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
Route::get("/",[MaquinaController::class,"queryMachine"])->name("queryMachine");

//Esta rota leva-nos até ao controller de auth
Route::get("login",[AuthController::class,"showLoginForm"])->name("login");

//Esta Rota leva ate ao formulario de login do Aluno(Secretaria-Online)
Route::get("aluno/login",[AuthController::class,"showLoginFormAluno"])->name("loginAluno");

//Esta rota leva os usuarios(Tecnicos ou Parceiros) aos seus formularios de pedido de Licenças
Route::get("license/resquestLicense",[LicenseController::class,"requestLicenseForm"])->name("requestLicenseForm");

//Esta rota leva-nos até ao controller de licença (Retorna Formulario de Licença)
Route::get("license",[MaquinaController::class,"showLicenseForm"])->name("license");

Route::post("license",[LicenseController::class,"requestLicense"])->name("requestLicense");