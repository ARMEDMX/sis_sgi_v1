@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DEL LUGAR: </h1>
<hr>
<ul>
    <li>{{ $materia->id }}</li>
    <li>{{ $materia->nombreMateria }}</li>
    <li>{{ $materia->nivel }}</li>
    <li>{{ $materia->nombreMediano }}</li>
    <li>{{ $materia->nombreCorto }}</li>
    <li>{{ $materia->modalidad }}</li>
    <li>{{ $materia->reticulas->descripcion }}</li>
    <li>{{ $materia->created_at }}</li>
    <li>{{ $materia->updated_at }}</li>
</ul>
<hr>
{{-- <a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a> --}}

@endsection