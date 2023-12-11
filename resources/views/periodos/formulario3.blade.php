@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($periodo->id))
        <h1>Editar</h1>
        <form action="{{ route('periodos.update', ['periodo' => $periodo->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('periodos.store')}} " method="POST">
    @endif    
    @csrf
        <x-select_periodo nombre="Periodo" valorcampo="{{$periodo->periodo}}" campo="periodo" holder="Escriba el Nombre del Departamento"/> 
        <x-input1 nombre="Descripcion Corta" valorcampo="{{$periodo->descCorta}}" campo="descCorta" holder="Escriba el Nombre Corto del Departamento"/> 
        <x-input-date nombre="Fecha Inicio" valorcampo="{{$periodo->fechaIni}}" campo="fechaIni" holder="Escriba la descripción"/>
        <x-input-date nombre="Fecha Fin" valorcampo="{{$periodo->fechaFin}}" campo="fechaFin" holder="Escriba la descripción"/>
        
    
        
      
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
