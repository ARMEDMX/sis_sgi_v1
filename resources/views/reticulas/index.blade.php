@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DE RETICULAS: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('reticulas.create') }}" role="button">
                Nueva Reticula
            </a>
                
        </div>

        <div class="search">
            <form action=" {{ route('reticulas.index') }} " method="get">
                <input type="text" id="txt" name="txtdescripcion">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>

    <div class="table-responsive">

        <h6 class="display-6">{{Session('mensaje')}}</h6>

        @if ($reticulas->isEmpty())
            <p>No se encontraron datos existentes.</p>
        @else
            <table id="table"
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Listado de Reticulas</caption>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Fecha en Vigor</th>
                        <th>Carreras</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($reticulas as $key => $reticula)
                        <tr class="table-primary">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $reticula->descripcion }}</td>
                            <td>{{ $reticula->fechaenvigor }}</td>
                            <td>{{ $reticula->carreras->nombre }}</td>
                            <td class="accion-btn">

                                {{-- <div class="show"> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('reticulas.show', ['reticula' => $reticula->id]) }}">Ver</a>
                                {{-- </div> --}}

                                <form method="POST" action="{{ route('reticulas.destroy', ['reticula' => $reticula->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger " type="submit" value="Eliminar">
                                </form>

                                {{-- <div class="editar"> --}}
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('reticulas.edit', ['reticula' => $reticula->id]) }}">
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
            {{ $reticulas->links() }}
        </div>
    </div>
    @endif
@endsection
