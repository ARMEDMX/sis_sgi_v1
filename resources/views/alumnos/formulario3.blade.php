@extends('plantillas.plantilla1')

@section('contenido1')

<div class="container" style="margin: 50px;">
    @if(isset($alumno->id))
        <h1>Editar</h1>
        <form action=" {{ route('alumnos.update', ['alumno' => $alumno->id] ) }} " method="POST" enctype="multipart/form-data">
    @method('PUT')   
    @else
        <h1>Insertar</h1>
        <form action=" {{ route('alumnos.store')}} " method="POST" enctype="multipart/form-data">
    @endif    
        @csrf
        <x-input1 nombre="Nombre: " valorcampo="{{$alumno->nombre}}" campo="nombre" holder="Escriba el Nombre del Alumno"></x-input1> 
        <x-input1 nombre="Apellido Paterno: " valorcampo="{{$alumno->apellidop}}" campo="apellidop" holder="Escriba el Apellido Paterno"></x-input1> 
        <x-input1 nombre="Apellido Materno: " valorcampo="{{$alumno->apellidom}}" campo="apellidom" holder="Escriba el Apellido Materno"></x-input1> 
       
        <x-input-foto seleccionArchivos="seleccionArchivos" nombre="Foto" valorcampo="{{$alumno->foto}}" campo="foto" holder="Una foto" foto="{{$alumno->foto}}"></x-input-foto>

            {{-- @if ($alumno->foto)
                <img src="{{$alumno->foto}}" alt="" width="200px">
            @endif
            --}}
        <x-submit1 />


       

        <ul>
            @foreach ($errors->All() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>

    </form>

   
</div>

<script>
    const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
 
// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});
</script>
@endsection


