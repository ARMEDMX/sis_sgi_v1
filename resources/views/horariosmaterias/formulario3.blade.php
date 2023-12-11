@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($horariom->id))
        <h1>Editar</h1>
        <form action="{{ route('horariosmaterias.update', ['horariom' => $horariom->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('horariosmaterias.store')}} " method="POST">
    @endif    
    @csrf
        <x-input1 nombre="Grupos: " valorcampo="{{$horariom->grupos}}" campo="grupos" holder="Escriba Grupos"/> 
        <x-input1 nombre="Total de Estudiantes: " valorcampo="{{$horariom->totalEstudiantes}}" campo="totalEstudiantes" holder="Escriba el Total de Estudiantes"/> 
        <x-select1 :arreglos="$horario" fk="{{ $horariom->horarios_id }}" leyenda="horarios_id" nombrelbl="Fecha: " pk="id" display="fecha"></x-select1>
        <x-input1 nombre="Tipo de Lugar: " valorcampo="{{$horariom->tipoLugar}}" campo="tipoLugar" holder="Escriba el Tipo de Lugar"/> 
        <x-select1 :arreglos="$materia" fk="{{ $horariom->materias_id }}" leyenda="materias_id" nombrelbl="Materias: " pk="id" display="nombreMateria"></x-select1>
        
        {{-- <x-input-date nombre="Fecha:  " valorcampo="{{$horariom->fecha}}" campo="fecha"/>  --}}
        
            <div class="form-group">
                <label for="lunes">Lunes:</label>
                <input type="checkbox" id="lunes" name="lunes" value="1">
            </div>
            <div class="form-group">
                <label for="martes">Martes:</label>
                <input type="checkbox" id="martes" name="martes" value="1">
            </div>
            <div class="form-group">
                <label for="miercoles">Miércoles:</label>
                <input type="checkbox" id="miercoles" name="miercoles" value="1">
            </div>
            <div class="form-group">
                <label for="jueves">Jueves:</label>
                <input type="checkbox" id="jueves" name="jueves" value="1">
            </div>
            <div class="form-group">
                <label for="viernes">Viernes:</label>
                <input type="checkbox" id="viernes" name="viernes" value="1">
            </div>
    
        
      
        <x-submit1 />

        {{-- <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">Grabar</button>
            </div>
        </div> --}}

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>
    </form>
</div>
@endsection
