<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenida', [PaginaController::class, 'index']);


Route::get('/saludo/{nombre}', [PaginaController::class, 'saludo']);
