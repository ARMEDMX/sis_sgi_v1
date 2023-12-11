@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($personal->id))
        <h1>Editar</h1>
        <form action="{{ route('personal.update', ['personal' => $personal->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('personal.store')}} " method="POST">
    @endif    
    @csrf
        <x-input1 nombre="RFC" valorcampo="{{$personal->RFC}}" campo="RFC" holder="Escriba su RFC"/> 
        <x-input1 nombre="Nombres" valorcampo="{{$personal->Nombres}}" campo="Nombres" holder="Escriba sus Nombres"/> 
        <x-input1 nombre="Apellido Paterno" valorcampo="{{$personal->apellidoP}}" campo="apellidoP" holder="Escriba su Apellido Paterno"/>
        <x-input1 nombre="Apellido Materno" valorcampo="{{$personal->apellidoM}}" campo="apellidoM" holder="Escriba su Apellido Materno"/>
        <x-input1 nombre="Licenciatura" valorcampo="{{$personal->licenciatura}}" campo="licenciatura" holder="Licenciatura"/>
        <x-input1 nombre="LicPasTit" valorcampo="{{$personal->licPasTit}}" campo="licPasTit" holder="LicPasTit"/>
        <x-input1 nombre="Especializacion" valorcampo="{{$personal->especializacion}}" campo="especializacion" holder="Especializacion"/>
        
        <x-input1 nombre="EspPasTit" valorcampo="{{$personal->espPasTit}}" campo="espPasTit" holder="EspPasTit"/>
        <x-input1 nombre="Maestria" valorcampo="{{$personal->maestria}}" campo="maestria" holder="Maestria"/>
        <x-input1 nombre="MaePasTit" valorcampo="{{$personal->maePasTit}}" campo="maePasTit" holder="MaePasTit"/>
        <x-input1 nombre="Doctorado" valorcampo="{{$personal->doctorado}}" campo="doctorado" holder="Doctorado"/>
        <x-input1 nombre="DocPasTit" valorcampo="{{$personal->docPasTit}}" campo="docPasTit" holder="DocPasTit"/>
    
            <x-select1 :arreglos="$deptos" fk="{{ $personal->deptos_id }}" leyenda="deptos_id" nombrelbl="Departamento: " pk="id" display="nombre"></x-select1>
        
        <x-input-date nombre="Fecha_Ing_Sep" valorcampo="{{$personal->fechaIngSep}}" campo="fechaIngSep" />
        <x-input-date nombre="Fecha_Ing_Ins" valorcampo="{{$personal->fechaIngIns}}" campo="fechaIngIns" />
    
            <x-select1 :arreglos="$puestos" fk="{{ $personal->puestos_id }}" leyenda="puestos_id" nombrelbl="Puesto: " pk="id" display="nombre"></x-select1>

    
        
      
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
