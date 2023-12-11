@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($personalplaza->id))
        <h1>Editar</h1>
        <form action="{{ route('personalplazas.update', ['personalplaza' => $personalplaza->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('personalplazas.store')}} " method="POST">
    @endif    
    @csrf
        <x-input1 nombre="Tipo Nombramiento" valorcampo="{{$personalplaza->tipoNombramiento}}" campo="tipoNombramiento" holder="Escriba el Tipo de Nombramiento"/> 
    
        <x-select1 :arreglos="$plazas" fk="{{ $personalplaza->plazas_id }}" leyenda="plazas_id" nombrelbl="Plaza: " pk="id" display="nombrePlaza"></x-select1>
    
        <x-select1 :arreglos="$personal" fk="{{ $personalplaza->personals_id }}" leyenda="personals_id" nombrelbl="Personal: " pk="id" display="RFC"></x-select1>
    
        
      
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
