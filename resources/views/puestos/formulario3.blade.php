@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($puesto->id))
        <h1>Editar</h1>
        <form action="{{ route('puestos.update', ['puesto' => $puesto->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('puestos.store')}} " method="POST">
    @endif    
    @csrf
        <x-input1 nombre="Nombre de Puesto" valorcampo="{{$puesto->nombre}}" campo="nombre" holder="Escriba el Nombre del Puesto"/> 
        <x-input1 nombre="Tipo de Puesto" valorcampo="{{$puesto->tipo}}" campo="tipo" holder="Describa el tipo de Puesto"/> 
        
    
        
      
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
