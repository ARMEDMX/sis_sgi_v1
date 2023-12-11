@extends('plantillas.plantilla1')

@section('contenido1')
    <h1 class="display-3">CATALOGO DE PERIODOS</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('periodos.create') }}" role="button">
                Nuevo Periodo</a>
        </div>

        <div class="search">
            <form action=" {{-- route('alumnos.index') --}} " method="get">
                <input type="text" id="txtperiodo" name="txtperiodo">
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
                <caption>Listado de Periodos</caption>
                <tr>
                    <th>ID</th>
                    <th>Periodo</th>
                    <th>Descripcion Corta</th>
                    <th>Fecha inicio</th>
                    <th>Fecha final</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($periodos as $periodo)
                    <tr class="table-primary">
                        <td>{{ $periodo->id }}</td>
                        <td scope="row">{{ $periodo->periodo }}</td>
                        <td>{{ $periodo->descCorta }}</td>
                        <td>{{ $periodo->fechaIni }}</td>
                        <td>{{ $periodo->fechaFin }}</td>
                        <td class="accion-btn">
                            <a class="btn btn-primary" href="{{ route('periodos.show', ['periodo' => $periodo->id]) }}">Ver</a>

                            <form method="POST" action="{{ route('periodos.destroy', ['periodo' => $periodo->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            <a name="" id="" class="btn btn-secondary" role="button"
                                href="{{ route('periodos.edit', ['periodo' => $periodo->id]) }}">Editar</a>       
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
            {{ $periodos->links() }}
        </div>
    </div>
@endsection
