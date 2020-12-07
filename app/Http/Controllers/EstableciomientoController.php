<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Estableciomiento;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EstableciomientoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consuktar las categorias
        $categorias=Categoria::all();
        return view('establecimientos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'=>'required',
            'categoria_id'=>'required|exists:App\Categoria,id',
            'imagen_principal'=>'required|image|max:1000',
            'direccion'=>'required',
            'colonia'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'telefono'=>'required|numeric',
            'descripcion'=>'required|min:50',
            'apertura'=>'date_format:H:i',
            'cierre'=>'date_format:H:i|after:apertura',
            'uuid'=>'required|uuid'
        ]);

        //Guardar la Imagen
        $ruta_imagen = $request['imagen_principal']->store('principales','public');

        //Resize a la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);
        $img->save();

        //Guardar en la BD
        //metodo 1 "para que funcione agregar el user_id al fillable"
        /*$estableciomiento = new Estableciomiento($data);
        $estableciomiento->imagen_principal=$ruta_imagen;
        $estableciomiento->user_id = auth()->user()->id;*/
        //metodo 2
        auth()->user()->establecimiento()->create([
            'nombre'=>$data['nombre'],
            'categoria_id'=>$data['categoria_id'],
            'imagen_principal'=>$ruta_imagen,
            'direccion'=>$data['direccion'],
            'colonia'=>$data['colonia'],
            'lat'=>$data['lat'],
            'lng'=>$data['lng'],
            'telefono'=>$data['telefono'],
            'descripcion'=>$data['descripcion'],
            'apertura'=>$data['apertura'],
            'cierre'=>$data['cierre'],
            'uuid'=>$data['uuid']
        ]);

        return back()->with('estado','Tu información se almacenó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function show(Estableciomiento $estableciomiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Estableciomiento $estableciomiento)
    {
        return "desde edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estableciomiento $estableciomiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estableciomiento  $estableciomiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estableciomiento $estableciomiento)
    {
        //
    }
}
