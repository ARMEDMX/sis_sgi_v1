@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DEL PERSONAL DE PLAZA: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('personalplazas.create') }}" role="button">
                Nuevo Personal de Plaza</a>
        </div>

        <div class="search">
            <form action=" {{-- route('deptos.index') --}} " method="get">
                <input type="text" id="txtrfc" name="txtrfc">
                <input type="submit" value="Buscar">
            </form>
        </div>
        
    </div>

    <hr>

    <div class="table-responsive">
        @if ($personalplazas->isEmpty())
            <p>No se encontraron datos existentes.</p>
        @else
            <table id="table"
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Listado de Personal</caption>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Nombramiento</th>
                        <th>RFC</th>
                        <th>Plazas</th>
                    
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($personalplazas as $personalplaza)
                        <tr class="table-primary">
                            <td>{{ $personalplaza->id }}</td>
                            <td>{{ $personalplaza->tipoNombramiento }}</td>
                            <td>{{ $personalplaza->personal->RFC }}</td>
                            <td>{{ $personalplaza->plazas->nombrePlaza }}</td>
                            
                            
                            
                            <td class="accion-btn">

                                {{-- <div class="show"> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('personalplazas.show', ['personalplaza' => $personalplaza->id]) }}">Ver</a>
                                {{-- </div> --}}

                                {{-- <div class="delete"> --}}
                                    <form method="POST" action="{{ route('personalplazas.destroy', ['personalplaza' => $personalplaza->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger " type="submit" value="Eliminar">
                                    </form>
                                    
                                {{-- </div> --}}

                                {{-- <div class="editar"> --}}
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('personalplazas.edit', ['personalplaza' => $personalplaza->id]) }}">Editar</a>
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
            {{ $personalplazas->links() }}
        </div>
    </div>
    @endif
@endsection
