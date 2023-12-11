@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($horario->id))
        <h1>Editar</h1>
        <form action="{{ route('horarios.update', ['horario' => $horario->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('horarios.store')}} " method="POST">
    @endif    
    @csrf
        <x-select1 :arreglos="$personal" fk="{{ $horario->personals_id }}" leyenda="personals_id" nombrelbl="Personal: " pk="id" display="RFC"></x-select1>
        <x-select1 :arreglos="$periodos" fk="{{ $horario->periodos_id }}" leyenda="periodos_id" nombrelbl="Periodos: " pk="id" display="periodo"></x-select1>
        <x-input-date nombre="Fecha:  " valorcampo="{{$horario->fecha}}" campo="fecha"/> 
        
    
        
      
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
