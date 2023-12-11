@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DE CARRERAS: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('carreras.create') }}" role="button">
                Nueva Carrera
            </a>
                
        </div>

        <div class="search">
            <form action=" {{ route('carreras.index') }} " method="get">
                <input type="text" id="txt" name="txtnombrecorto">
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <hr>

    <div class="table-responsive">

        <h6 class="display-6">{{Session('mensaje')}}</h6>
        
        @if ($carreras->isEmpty())
            <p>No se encontraron datos existentes.</p>
        @else
            <table id="table"
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Listado de Carreras</caption>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nombre Corto</th>
                        <th>Departamentos</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($carreras as $key => $carrera)
                        <tr class="table-primary">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $carrera->nombre }}</td>
                            <td>{{ $carrera->nombrecorto }}</td>
                            <td>{{ $carrera->depto->nombre }}</td>
                            
                            <td class="accion-btn">

                                {{-- <div class="show"> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('carreras.show', ['carrera' => $carrera->id]) }}">Ver</a>
                                {{-- </div> --}}

                                <form method="POST" action="{{ route('carreras.destroy', ['carrera' => $carrera->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger " type="submit" value="Eliminar">
                                </form>

                                {{-- <div class="editar"> --}}
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('carreras.edit', ['carrera' => $carrera->id]) }}">
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
            {{ $carreras->links() }}
        </div>
    </div>
    @endif
@endsection
