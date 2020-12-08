<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Estableciomiento;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //metodo para obtener todas las categorias
    public function categorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    //Muestra los establecimientos de la categoria
    public function categoria(Categoria $categoria)
    {
        $establecimientos = Estableciomiento::where('categoria_id',$categoria->id)->with('categoria')->get();
        return response()->json($establecimientos);
    }
}
