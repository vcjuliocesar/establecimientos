<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Establecimiento;
use App\Imagen;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //metodo para obtener todos los establecimientos
    public function index()
    {
        $establecimientos = Establecimiento::with('categoria')->get();

        return response()->json($establecimientos);
    }

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

    public function establecimientoscategoria(Categoria $categoria)
    {
        $establecimientos = Establecimiento::where('categoria_id',$categoria->id)->with('categoria')->get();
        return response()->json($establecimientos);
    }

    //Muestra un establecimiento en especifico
    public function show(Establecimiento $establecimiento)
    {
        $imagenes = Imagen::where('id_establecimiento',$establecimiento->uuid)->get();
        $establecimiento->imagenes = $imagenes;
        return response()->json($establecimiento);
    }
}
