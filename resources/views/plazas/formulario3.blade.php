@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($plaza->id))
        <h1>Editar</h1>
        <form action="{{ route('plazas.update', ['plaza' => $plaza->id] ) }}" method="POST">
        @method('PUT')    
        @else
        <h1>Insertar</h1>
        <form action=" {{ route('plazas.store')}} " method="POST">
    @endif    
    @csrf
        <x-input1 nombre="Nombre de la Plaza" valorcampo="{{$plaza->nombrePlaza}}" campo="nombrePlaza" holder="Escriba el Nombre Plaza"/> 

        
      
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
