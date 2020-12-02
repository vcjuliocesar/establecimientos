@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4">Registrar Establecimiento </h1>
        <div class="mt-5 row justify-content-center">
            <form action="" class="col-md-9 col-xs-12 card card-body">
                <fieldset class="border p-4">
                    <legend class="text-primary">Nombre y Categoría</legend>
                    <div class="form-group">
                        <label for="nombre">Nombre Establecimiento</label>
                        <input
                            type="text"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Nombre Establecimiento"
                            name="nombre"
                            value="{{old('nombre')}}"
                            >

                            @error('nombre')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select
                            name="categoria"
                            id="categoria"
                            class="form-control  @error('categoria') is-invalid @enderror"
                            name="categoria_id"
                        >
                                <option value="" selected disabled> -- Seleccione --</option>
                                @foreach ($categorias as $categoria)
                                    <option
                                        value="{{$categoria->id}}"
                                        {{old('categoria_id') == $categoria->id ? 'selected' :''}}
                                    >{{$categoria->nombre}}</option>
                                @endforeach
                        </select>
                        @error('categoria')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
