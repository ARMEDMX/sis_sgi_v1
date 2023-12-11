@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DE MATERIAS: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('materias.create') }}" role="button">
                Nueva Materia
            </a>
                
        </div>

        <div class="search">
            <form action=" {{ route('materias.index') }} " method="get">
                <input type="text" id="txt" name="txtnombreMateria">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>

    <div class="table-responsive">

        <h6 class="display-6">{{Session('mensaje')}}</h6>

        @if ($materias->isEmpty())
            <p>No se encontraron datos existentes.</p>
        @else
            <table id="table"
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Listado de Materias</caption>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Materia</th>
                        <th>Nivel</th>
                        <th>Nombre Mediano</th>
                        <th>Nombre Corto</th>
                        <th>Modalidad</th>
                        <th>Reticulas</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($materias as $materia)
                        <tr class="table-primary">
                            {{-- <td>{{ $key + 1 }}</td> --}}
                            <td>{{ $materia->id }}</td>
                            <td>{{ $materia->nombreMateria }}</td>
                            <td>{{ $materia->nivel }}</td>
                            <td>{{ $materia->nombreMediano }}</td>
                            <td>{{ $materia->nombreCorto }}</td>
                            <td>{{ $materia->modalidad }}</td>
                            <td>{{ $materia->reticulas->descripcion }}</td>
                            <td class="accion-btn">

                                {{-- <div class="show"> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('materias.show', ['materia' => $materia->id]) }}">Ver</a>
                                {{-- </div> --}}

                                <form method="POST" action="{{ route('materias.destroy', ['materia' => $materia->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger " type="submit" value="Eliminar">
                                </form>

                                {{-- <div class="editar"> --}}
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('materias.edit', ['materia' => $materia->id]) }}">
                                        Editar</a>
                                {{-- </div> --}}

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
            {{ $materias->links() }}
        </div>
    </div>
    @endif
@endsection
