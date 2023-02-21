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

//Esta rota leva-nos até ao controller de auth
Route::get("login",[AuthController::class,"showLoginForm"])->name("login");

//Esta rota leva-nos até ao controller de licença (Retorna Formulario de Licença)
Route::get("license",[LicencaController::class,"showLicenseForm"])->name("license");

//Esta rota leva-nos até ao controller de licença(Consulta Maquina com Licença)
Route::get("/",[LicencaController::class,"queryMachine"])->name("welcome");

//Esta Rota leva ate ao formulario de login do Aluno(Secretaria-Online)
Route::get("aluno/login",[AuthController::class,"showLoginFormAluno"])->name("loginAluno");

 
  
