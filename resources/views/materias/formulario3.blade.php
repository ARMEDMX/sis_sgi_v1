@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($materia->id))
        <h1>Editar</h1>
        <form action="{{ route('materias.update', ['materia' => $materia->id] ) }}" method="POST">
    @method('PUT')   
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('materias.store')}} " method="POST">
    @endif    
        @csrf
        
        <x-input1 nombre="Nombre de Materia " valorcampo="{{$materia->nombreMateria}}" campo="nombreMateria" holder="Escriba el Nombre de la Materia"/> 
            
        <x-input1 nombre="Nivel " valorcampo="{{$materia->nivel}}" campo="nivel" holder="Niveles A, B, C o D"/> 
            
        <x-input1 nombre="Nombre Mediano " valorcampo="{{$materia->nombreMediano}}" campo="nombreMediano" holder="Escriba el Nombre Mediano"/> 
            
        <x-input1 nombre="Nombre Corto " valorcampo="{{$materia->nombreCorto}}" campo="nombreCorto" holder="Escriba el Nombre Corto"/> 
            
        <x-input1 nombre="Modalidad " valorcampo="{{$materia->modalidad}}" campo="modalidad" holder="Modalidades P, V o S"/> 
       
        <x-select1 :arreglos="$reticula" fk="{{ $materia->reticula_id }}" leyenda="reticula_id" nombrelbl="Reticulas: " pk="id" display="descripcion"></x-select1>
        
        <x-submit1 />
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection
