{{-- @extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DEL ALUMNO: </h1>
<hr>
<ul>
    <li>{{ $alumno->id }}</li>
    <li>{{ $alumno->nombre }}</li>
    <li>{{ $alumno->apellidop }}</li>
    <li>{{ $alumno->apellidom }}</li>
    <li>{{ $alumno->created_at }}</li>
    <li>{{ $alumno->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a>

@endsection --}}

@extends('plantillas.plantilla1')

@section('contenido1')
<div class="card w-50 mx-auto mt-4">
    <div class="card-body text-center">
        <div class="d-flex justify-content-center">
            <img src="{{ asset($alumno->foto) }}" alt="Foto del Alumno" class="card-img-top img-fluid rounded" style="max-height: 300px; max-width: 300px;">
        </div>
        <h5 class="card-title mt-3">{{ $alumno->nombre }} {{ $alumno->apellidop }} {{ $alumno->apellidom }}</h5>
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $alumno->id }}</li>
            <li class="list-group-item">Fecha de Creación: {{ $alumno->created_at }}</li>
            <li class="list-group-item">Fecha de Actualización: {{ $alumno->updated_at }}</li>
        </ul>
    </div>
    <div class="card-footer text-center">
        <a href="{{ route('alumnos.destroy', ['alumno' => $alumno->id]) }}" class="btn btn-danger">Eliminar Alumno</a>
    </div>
</div>
@endsection

