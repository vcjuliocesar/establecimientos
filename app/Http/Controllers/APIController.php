<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Establecimiento;
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
        $establecimientos = Establecimiento::where('categoria_id',$categoria->id)->with('categoria')->take(3)->get();
        return response()->json($establecimientos);
    }

    //Muestra un establecimiento en especifico
    public function show(Establecimiento $establecimiento)
    {
        return response()->json($establecimiento);
    }
}
