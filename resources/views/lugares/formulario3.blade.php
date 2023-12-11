@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($Lugares->id))
        <h1>Editar</h1>
        <form action="{{ route('lugares.update', ['Lugares' => $Lugares->id] ) }}" method="POST">
    @method('PUT')    
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('lugares.store')}} " method="POST">
    @endif    
        @csrf
        <x-input1 nombre="Nombre de Lugar" valorcampo="{{$Lugares->nombreLugar}}" campo="nombreLugar" holder="Escriba el Nombre del Lugar"/> 
        
        <x-input1 nombre="Descripcion" valorcampo="{{$Lugares->descripcion}}" campo="descripcion" holder="Describa el Lugar"/> 

        <x-input1 nombre="Edificio" valorcampo="{{$Lugares->edificio}}" campo="edificio" holder="Escriba el numero del Edificio"/> 

        <x-submit1 />
        

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>
</div>
@endsection
