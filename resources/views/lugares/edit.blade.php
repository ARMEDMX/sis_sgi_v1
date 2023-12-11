@extends('plantillas.plantilla1')

@section('contenido1')
<div class="container" style="margin: 50px;">
    {{-- <form action="{{ route('deptos.update', $deptos) }}" method="POST"> --}}
        <form action="{{ route('lugares.update', ['Lugares' => $Lugares->id] ) }}" method="POST">
        @csrf
        @method('PUT') <!-- Usamos el método PUT para la actualización -->
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nombre de Lugar:</label>
            <div class="col-8">
                <input type="text" value="{{ $Lugares->nombreLugar }}" class="form-control" name="nombreLugar" id="">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Descripcion:</label>
            <div class="col-8">
                <input type="text" value="{{ $Lugares->descripcion }}" class="form-control" name="descripcion" id="">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Edificio:</label>
            <div class="col-8">
                <input type="text" value="{{ $Lugares->edificio }}" class="form-control" name="edificio" id="">
            </div>
        </div>

     

        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
