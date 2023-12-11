@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DEL PERSONAL: </h1>
<hr>
<ul>
    <li><strong>ID:</strong> {{ $personal->id }}</li>
    <li><strong>RFC:</strong> {{ $personal->RFC }}</li>
    <li><strong>Nombres:</strong> {{ $personal->Nombres }}</li>
    <li><strong>Apellido Paterno:</strong> {{ $personal->apellidoP }}</li>
    <li><strong>Apellido Materno:</strong> {{ $personal->apellidoM }}</li>
    <li><strong>Licenciatura:</strong> {{ $personal->licenciatura }}</li>
    <li><strong>Fecha de titulación (Licenciatura):</strong> {{ $personal->licPasTit }}</li>
    <li><strong>Especialización:</strong> {{ $personal->especializacion }}</li>
    <li><strong>Fecha de titulación (Especialización):</strong> {{ $personal->espPasTit }}</li>
    <li><strong>Maestría:</strong> {{ $personal->maestria }}</li>
    <li><strong>Fecha de titulación (Maestría):</strong> {{ $personal->maePasTit }}</li>
    <li><strong>Doctorado:</strong> {{ $personal->doctorado }}</li>
    <li><strong>Fecha de titulación (Doctorado):</strong> {{ $personal->docPasTit }}</li>
    <li><strong>Departamento:</strong> {{ $personal->deptos->nombre }}</li>
    <li><strong>Fecha de ingreso (Separación):</strong> {{ $personal->fechaIngSep }}</li>
    <li><strong>Fecha de ingreso (Institución):</strong> {{ $personal->fechaIngIns }}</li>
    <li><strong>Puesto:</strong> {{ $personal->puestos->nombre }}</li>
    <li><strong>Creado en:</strong> {{ $personal->created_at }}</li>
    <li><strong>Actualizado en:</strong> {{ $personal->updated_at }}</li>
</ul>
<hr>

@endsection
