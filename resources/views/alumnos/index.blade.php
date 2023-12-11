@extends('plantillas.plantilla1')

@section('contenido1')
    <h1 class="display-3">CATALOGO DE ALUMNOS</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('alumnos.create') }}" role="button">Nuevo
                Alumno</a>
        </div>

        <div class="search">
            <form action=" {{ route('alumnos.index') }} " method="get">
                <input type="text" id="txtapellido" name="txtapellido">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>

    <h6 class="display-6">{{ session('mensaje' )}}</h6>

    <div class="table-responsive">
        <table id="table"
            class="table table-striped 
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Listado de Alumno</caption>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($alumnos as $alumno)
                    <tr class="table-primary">
                        <td>
                            <img src="{{ $alumno->foto }}" style="width: 50px; height: 50px;" alt="">
                        </td>
                        <td>{{ $alumno->id }}</td>
                        <td scope="row">{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidop }}</td>
                        <td>{{ $alumno->apellidom }}</td>
                        <td class="accion-btn">
                            <a class="btn btn-primary" href="{{ route('alumnos.show', ['alumno' => $alumno->id]) }}">Ver</a>

                            <form method="POST" action="{{ route('alumnos.destroy', ['alumno' => $alumno->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            <a name="" id="" class="btn btn-secondary" role="button"
                                href="{{ route('alumnos.edit', ['alumno' => $alumno->id]) }}">Editar</a>       
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <!-- Hoy -->
            </tfoot>
        </table>
    </div>

    <div class="row justify-content-lg-start">
        <div class="col-auto">
            {{ $alumnos->links() }}
        </div>
    </div>
@endsection
