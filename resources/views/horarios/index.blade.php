@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DE HORARIOS: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('horarios.create') }}" role="button">
                Nuevo Horario</a>
        </div>

        <div class="search">
            <form action=" {{-- route('horarios.index') --}} " method="get">
                <input type="text" id="txtRFC" name="txtRFC">
                <input type="submit" value="Buscar">
            </form>
        </div>
        
    </div>

    <hr>

    <div class="table-responsive">
        @if ($horarios->isEmpty())
            <p>No se encontraron datos existentes.</p>
        @else
            <table id="table"
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Listado de Departamentos</caption>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nombre Corto</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($horarios as $horario)
                        <tr class="table-primary">
                            <td>{{ $horario->id }}</td>
                            <td>{{ $horario->fecha }}</td>
                            <td>{{ $horario->personal->RFC }}</td>
                            <td>{{ $horario->periodos->periodo }}</td>
                            
                            <td class="accion-btn">

                              
                                    <a class="btn btn-primary"
                                        href="{{ route('horarios.show', ['horario' => $horario->id]) }}">Ver</a>
                               
                                    <form method="POST" action="{{ route('horarios.destroy', ['horario' => $horario->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger " type="submit" value="Eliminar">
                                    </form>
                    
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('horarios.edit', ['horario' => $horario->id]) }}">Editar</a>
                              
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
            {{ $horarios->links() }}
        </div>
    </div>
    @endif
@endsection
