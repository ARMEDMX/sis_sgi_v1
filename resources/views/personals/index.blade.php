@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DEL PERSONAL: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('personal.create') }}" role="button">Nuevo
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
        @if ($personals->isEmpty())
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
                        <th>RFC</th>
                        <th>Nombres</th>
                        <th>apellidoP</th>
                        <th>apellidoM</th>
                        <th>licenciatura</th>
                        <th>licPasTit</th>
                        <th>especializacion</th>
                        <th>espPasTit</th>
                        <th>maestria</th>
                        <th>maePasTit</th>
                        <th>doctorado</th>
                        <th>docPasTit</th>
                        <th>DEPARTAMENTO</th>
                        <th>fechaIngSep</th>
                        <th>fechaIngIns</th>
                        <th>PUESTO</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($personals as $personal)
                        <tr class="table-primary">
                            <td>{{ $personal->id }}</td>
                            <td>{{ $personal->RFC }}</td>
                            <td>{{ $personal->Nombres }}</td>
                            <td>{{ $personal->apellidoP }}</td>
                            <td>{{ $personal->apellidoM }}</td>
                            <td>{{ $personal->licenciatura }}</td>
                            <td>{{ $personal->licPasTit }}</td>
                            <td>{{ $personal->especializacion }}</td>
                            <td>{{ $personal->espPasTit }}</td>
                            <td>{{ $personal->maestria }}</td>
                            <td>{{ $personal->maePasTit }}</td>
                            <td>{{ $personal->doctorado }}</td>
                            <td>{{ $personal->docPasTit }}</td>
                            <td>{{ $personal->deptos->nombre }}</td>
                            <td>{{ $personal->fechaIngSep }}</td>
                            <td>{{ $personal->fechaIngIns }}</td>
                            <td>{{ $personal->puestos->nombre }}</td>
                            
                            
                            <td class="accion-btn">

                                {{-- <div class="show"> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('personal.show', ['personal' => $personal->id]) }}">Ver</a>
                                {{-- </div> --}}

                                {{-- <div class="delete"> --}}
                                    <form method="POST" action="{{ route('personal.destroy', ['personal' => $personal->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger " type="submit" value="Eliminar">
                                    </form>
                                    
                                {{-- </div> --}}

                                {{-- <div class="editar"> --}}
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('personal.edit', ['personal' => $personal->id]) }}">Editar</a>
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
            {{ $personals->links() }}
        </div>
    </div>
    @endif
@endsection
