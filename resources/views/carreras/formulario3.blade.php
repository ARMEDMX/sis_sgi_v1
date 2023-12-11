@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($carrera->id))
        <h1>Editar</h1>
        <form action="{{ route('carreras.update', ['carrera' => $carrera->id] ) }}" method="POST">
    @method('PUT')   
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('carreras.store')}} " method="POST">
    @endif    
        @csrf
        
        <x-input1 nombre="Nombre " valorcampo="{{$carrera->nombre}}" campo="nombre" holder="Escriba el Nombre de la Carrera"/> 
            
        <x-input1 nombre="Nombre Corto " valorcampo="{{$carrera->nombrecorto}}" campo="nombrecorto" holder="Escriba el Nombre Corto de la Carrera"/> 

        <x-select1 :arreglos="$depto" fk="{{ $carrera->deptos_id }}" leyenda="deptos_id" nombrelbl="Departamento: " pk="id" display="nombre"></x-select1>

        <x-submit1 />
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection
