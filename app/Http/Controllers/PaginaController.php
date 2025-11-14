<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function bienvenida()
    {
        return view('Bienvenida');
    }
    public function saludo($nombre)
    {
        return view('saludo', ['nombre' => $nombre]);

    }

}
