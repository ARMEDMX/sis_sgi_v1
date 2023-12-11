@extends('plantillas.plantilla1')

@section('contenido1')
    <h1 class="display-3">CATALOGO DE PUESTOS</h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('puestos.create') }}" role="button">
                Nuevo Puesto</a>
        </div>

        <div class="search">
            <form action=" {{-- route('alumnos.index') --}} " method="get">
                <input type="text" id="txtnombre" name="txtnombre">
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
                <caption>Listado de Puestos</caption>
                <tr>
                    <th>ID</th>
                    <th>Nombre Puesto</th>
                    <th>Tipo de Puesto</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($puestos as $puesto)
                    <tr class="table-primary">
                        <td>{{ $puesto->id }}</td>
                        <td>{{ $puesto->nombre }}</td>
                        <td>{{ $puesto->tipo }}</td>
                        <td class="accion-btn">
                            <a class="btn btn-primary" href="{{ route('puestos.show', ['puesto' => $puesto->id]) }}">Ver</a>

                            <form method="POST" action="{{ route('puestos.destroy', ['puesto' => $puesto->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger " type="submit" value="Eliminar">
                            </form>

                            <a name="" id="" class="btn btn-secondary" role="button"
                                href="{{ route('puestos.edit', ['puesto' => $puesto->id]) }}">Editar</a>       
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
            {{ $puestos->links() }}
        </div>
    </div>
@endsection
