<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site-protegido', [SiteController::class, 'index'])
    ->middleware('verificar.permissao')
    ->name('site.protegido');

Route::get('/acesso-negado', function () {
    return view('site.negado');
})->name('acesso.negado');
