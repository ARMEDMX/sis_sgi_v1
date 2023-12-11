@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DE LOS DEPARTAMENTOS: </h1>
<hr>
<ul>
    <li>{{ $deptos->id }}</li>
    <li>{{ $deptos->nombre }}</li>
    <li>{{ $deptos->nombrecorto }}</li>
    <li>{{ $deptos->descripcion }}</li>
    <li>{{ $deptos->created_at }}</li>
    <li>{{ $deptos->updated_at }}</li>
</ul>
<hr>
<a name="" id="" class="btn btn-danger" href="{{ route('deptos.destroy', ['deptos'=>$deptos->id]) }}" role="button">Eliminar Alumno</a>

@endsection