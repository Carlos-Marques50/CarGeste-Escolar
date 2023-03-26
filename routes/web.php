<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LicenseController;
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
Route::get("/",[MaquinaController::class,"page"])->name("queryMachine");

//Esta rota leva os usuarios(Tecnicos ou Parceiros) aos seus formularios de pedido de Licenças
Route::get("license/resquestLicense",[LicenseController::class,"requestLicenseForm"])->name("requestLicenseForm");

//Esta rota leva-nos até ao controller de licença (Retorna Formulario de Licença)
Route::get("license",[MaquinaController::class,"showLicenseForm"])->name("license");

//Esta rota leva-nos ao metodo que processa o pedido de licenças
Route::post("/",[LicenseController::class,"requestLicense"])->name("requestLicense");

//Grupo de Rotas do Admin
Route::prefix("admin")->middleware("auth")->group(function(){
    Route::get("license", [AdminController::class,"showLicense"])->name("showLicense");
    Route::get("parceiros",[AdminController::class,"showParceiros"])->name("showParceiros");
    Route::get("usuarios",[AdminController::class,"showUsuarios"])->name("showUsuarios"); 
    Route::post("cadastrar",[AdminController::class,"storeParceiro"])->name("storeParceiro");
    Route::get("cadastrar_parceiro",[AdminController::class,"cadastrarParceiroForm"])->name("cadastrarParceiro");
    Route::put("parceiros/{id}",[AdminController::class,'changeStateParceiro'])->name("changeStateParceiro");
    Route::get("cadastrar_usuario",[AdminController::class,'cadastrarUsuarioForm'])->name("cadastrarUsuario");
    Route::post("cadastrar_usuario",[AdminController::class,'storeUsuario'])->name("storeUsuario");
    Route::get("editar/{id}",[AdminController::class, "edit_user"])->name('edit');
    Route::put("editar/{id}",[AdminController::class, 'update_user'])->name("update");
    Route::put("editar/parceiro/{id}",[AdminController::class, 'update_parceiro'])->name("updateParceiro");
    Route::get("dashboard",[AdminController::class,'index'])->name("dashboard");
    Route::get("editar/parceiro/{id}",[AdminController::class, 'edit_parceiro'])->name('edit_parceiro');
});

//Grupo de Rotas para tratamento de Login
Route::prefix("auth")->group(function(){
    Route::get("login",[AuthController::class,"showLoginForm"])->name("login");
    Route::post("checkLogin",[AuthController::class,'checkLogin'])->name("checkLogin");
    Route::post("logout",[AuthController::class,'logout'])->name("logout");
    Route::delete("apagar/{id}",[AuthController::class, 'destroy'])->name('destroy');
}); 
