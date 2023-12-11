@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($deptos->id))
        <h1>Editar</h1>
        <form action="{{ route('deptos.update', ['deptos' => $deptos->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('deptos.store')}} " method="POST">
    @endif    
    @csrf
        <x-input1 nombre="Nombre del Departamento" valorcampo="{{$deptos->nombre}}" campo="nombre" holder="Escriba el Nombre del Departamento"/> 
        <x-input1 nombre="Nombre Corto" valorcampo="{{$deptos->nombrecorto}}" campo="nombrecorto" holder="Escriba el Nombre Corto del Departamento"/> 
        <x-input1 nombre="Descripcion" valorcampo="{{$deptos->descripcion}}" campo="descripcion" holder="Escriba la descripción"/>
        
    
        
      
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
