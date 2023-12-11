@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <div class="title">
        <h1 class="display-3">CATALOGO DE LUGARES: </h1>
    </div>
    
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('lugares.create') }}" role="button">Nuevo
                Lugar</a>
        </div>

        <div class="search">
            <form action=" {{ route('lugares.index') }} " method="get">
                <input type="text" id="txtnombrelugar" name="txtnombrelugar">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>


    <div class="table-responsive">
        @if ($Lugar->isEmpty())
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
                    <th>Nombre Lugar</th>
                    <th>Descripcion</th>
                    <th>Edificio</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($Lugar as $Lugares)
                    <tr class="table-primary">
                        <td>{{ $Lugares->id }}</td>
                        <td>{{ $Lugares->nombreLugar }}</td>
                        <td>{{ $Lugares->descripcion }}</td>
                        <td>{{ $Lugares->edificio}}</td>
                        <td>
                            {{-- <div class="show"> --}}
                                <a class="btn btn-primary"
                                    href="{{ route('lugares.show', ['Lugares' => $Lugares->id]) }}">Ver</a>
                            {{-- </div> --}}

                            <form method="POST" action="{{ route('lugares.destroy', ['Lugares' => $Lugares->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            {{-- <div class="editar"> --}}
                                <a name="" id="" class="btn btn-secondary" role="button"
                                    href="{{ route('lugares.edit', ['Lugares' => $Lugares->id]) }}">Editar</a>
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
            {{ $Lugar->links() }}
        </div>
    </div>
    @endif
@endsection
