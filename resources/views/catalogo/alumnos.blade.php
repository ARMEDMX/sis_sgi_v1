@extends("plantillas/plantilla1")

@section("contenido1")

    <h1 class="display-1 bg-danger">En construcción...</h1>
    <h2 class="display-3 bg-danger">CRUD: ALUMNOS </h2>
    
    <hr>
    
    <p>Personas</p>
    <a href=" {{ route('modal') }} " style="color: black;">Aqui esta la modal</a>

@endsection