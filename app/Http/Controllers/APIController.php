<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //metodo para obtener todas las categorias
    public function categorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }
}
