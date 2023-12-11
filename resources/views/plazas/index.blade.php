@extends('plantillas.plantilla1')

@section('contenido1')
    <h1 class="display-3">CATALOGO DE PLAZAS</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('plazas.create') }}" role="button">
                Nueva Plaza</a>
        </div>

        <div class="search">
            <form action=" {{-- route('alumnos.index') --}} " method="get">
                <input type="text" id="txtnombrePlaza" name="txtnombrePlaza">
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
                <caption>Listado de Plazas</caption>
                <tr>
                    <th>ID</th>
                    <th>Nombre Plaza</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($plazas as $plaza)
                    <tr class="table-primary">
                        <td>{{ $plaza->id }}</td>
                        <td>{{ $plaza->nombrePlaza }}</td>
                        <td class="accion-btn">
                            <a class="btn btn-primary" href="{{ route('plazas.show', ['plaza' => $plaza->id]) }}">Ver</a>

                            <form method="POST" action="{{ route('plazas.destroy', ['plaza' => $plaza->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            <a name="" id="" class="btn btn-secondary" role="button"
                                href="{{ route('plazas.edit', ['plaza' => $plaza->id]) }}">Editar</a>       
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
            {{ $plazas->links() }}
        </div>
    </div>
@endsection
