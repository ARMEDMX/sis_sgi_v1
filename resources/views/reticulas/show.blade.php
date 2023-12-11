@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DEL LUGAR: </h1>
<hr>
<ul>
    <li>{{ $reticula->id }}</li>
    <li>{{ $reticula->descripcion }}</li>
    <li>{{ $reticula->fechaenvigor }}</li>
    <li>{{ $reticula->carreras->nombre }}</li>
    <li>{{ $reticula->created_at }}</li>
    <li>{{ $reticula->updated_at }}</li>
</ul>
<hr>
{{-- <a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a> --}}

@endsection