@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($reticula->id))
        <h1>Editar</h1>
        <form action="{{ route('reticulas.update', ['reticula' => $reticula->id] ) }}" method="POST">
    @method('PUT')   
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('reticulas.store')}} " method="POST">
    @endif    
        @csrf
        
        <x-input1 nombre="Descripcion " valorcampo="{{$reticula->descripcion}}" campo="descripcion" holder="Escriba la descripcion de la Reticula"/> 
            
        <x-input-date nombre="Fecha en Vigor " valorcampo="{{$reticula->fechaenvigor}}" campo="fechaenvigor"/> 
        
        {{-- <select class="form-select form-select-lg " name="carrera_id" >
                <option value="" disabled selected>Selecciona una Carrera</option>
                @foreach ($depto as $deptos)
                <option value="{{$deptos->id}}" {{$carrera->deptos_id == $deptos->id ? 'selected' : ''}}>{{$deptos->nombre}}</option>
                    
                @endforeach
            
        </select> --}}

        <x-select1 :arreglos="$carrera" fk="{{ $reticula->carrera_id }}" leyenda="carrera_id" nombrelbl="Carreras: " pk="id" display="nombre">
        </x-select1>

        <x-submit1 />
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection
