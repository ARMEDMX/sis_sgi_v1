@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DE DEPARTAMENTOS: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('deptos.create') }}" role="button">Nuevo
                Departamento</a>
        </div>

        <div class="search">
            <form action=" {{ route('deptos.index') }} " method="get">
                <input type="text" id="txtnombrecorto" name="txtnombrecorto">
                <input type="submit" value="Buscar">
            </form>
        </div>
        
    </div>

    <hr>

    <div class="table-responsive">
        @if ($departamentos->isEmpty())
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
                    @foreach ($departamentos as $deptos)
                        <tr class="table-primary">
                            <td>{{ $deptos->id }}</td>
                            <td>{{ $deptos->nombre }}</td>
                            <td>{{ $deptos->nombrecorto }}</td>
                            <td>{{ $deptos->descripcion }}</td>
                            
                            <td class="accion-btn">

                                {{-- <div class="show"> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('deptos.show', ['deptos' => $deptos->id]) }}">Ver</a>
                                {{-- </div> --}}

                                {{-- <div class="delete"> --}}
                                    <form method="POST" action="{{ route('deptos.destroy', ['deptos' => $deptos->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger " type="submit" value="Eliminar">
                                    </form>
                                    
                                {{-- </div> --}}

                                {{-- <div class="editar"> --}}
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('deptos.edit', ['deptos' => $deptos->id]) }}">Editar</a>
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
            {{ $departamentos->links() }}
        </div>
    </div>
    @endif
@endsection
