@extends("plantillas/plantilla1")

@section("contenido1")

    <form action=" {{ route('respuesta') }} " method="POST">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Nombre: </label>
          <input type="text"
            class="form-control" name="nombre" id="" value="" aria-describedby="helpId" placeholder="Nombre">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Apellido Paterno: </label>
          <input type="text"
            class="form-control" name="apellidop" id="" value="" aria-describedby="helpId" placeholder="Apellido Paterno">
        </div>


                
        <button type="submit" class="btn btn-primary">Enviar Datos</button>
    </form>
    
  
    
@endsection