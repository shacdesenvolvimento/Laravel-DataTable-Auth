<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\SociosController;
use App\Http\Controllers\EmpresasSocioController;

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



 //LOGIN
 Route::get('/', [LoginController::class,'inicio'])->name('inicio')->middleware('auth');
 Route::post('/auth', [LoginController::class,'auth'])->name('login.auth');
 Route::get('/logout', [LoginController::class,'logout'])->name('logout');
 Route::post('/inseri_login', [LoginController::class,'store'])->name('inseri_login');
 Route::get('/login', function () {
    return view('login.login');
})->name('login');
Route::get('/criar_login', function () {
    return view('login.crialogin');
})->name('criar_login');


//EMPRESAS

Route::get('/empresas',[EmpresasController::class,'index'])->name('empresas');
Route::post('/update.empresa',[EmpresasController::class,'update'])->name('empresas.update');
Route::delete('/destroy.empresa/{id}',[EmpresasController::class,'destroy'])->name('empresas.destroy');
Route::post('/criar.empresa',[EmpresasController::class,'store'])->name('empresas.criar');
Route::get('/empresa/{id}', [EmpresasController::class,'show'])->name('editar_empresa');


//EMPRESA POR SOCIO
Route::post('/empresas_socio.criar',[EmpresasSocioController::class,'store'])->name('empresas_socio.criar');

//SOCIO
Route::get('/socios',[SociosController::class,'index'])->name('socios');
Route::post('/update.socio',[SociosController::class,'update'])->name('socios.update');
Route::delete('/destroy.socio/{id}',[SociosController::class,'destroy'])->name('socios.destroy');
Route::post('/criar.socio',[SociosController::class,'store'])->name('socios.criar');
Route::get('/socio/{id}', [SociosController::class,'show'])->name('editar_socio');
