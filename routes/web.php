<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('Bienvenida');
});
Route::get('/saludo/{nombre}', [PaginaController::class, 'saludo']);

Route::get('/productos', [ProductoController::class, 'index']);
