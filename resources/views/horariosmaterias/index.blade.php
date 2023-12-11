@extends('plantillas.plantilla1')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css?1.0') }}" media="all" />
@endsection

@section('contenido1')
    <h1 class="display-3">CATALOGO DE HORARIOS MATERIAS: </h1>
    <hr>

    <div class="tools">
        <div class="button_new">
            <a name="" id="" class="btn btn-primary" href="{{ route('horariosmaterias.create') }}" role="button">
                Nuevo Horario de Materia</a>
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
        @if ($horariosmats->isEmpty())
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
                        <th>Materia</th>
                        <th>Grupos</th>
                        <th>Total Estudiantes</th>
                        <th>Personal</th>
                        <th>Periodo</th>
                        <th>Lugar</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($horariosmats as $horariom)
                        <tr class="table-primary">
                            <td>{{ $horariom->id }}</td>
                            <td>{{ $horariom->materias->nombreMateria }}</td>
                            <td>{{ $horariom->grupos }}</td>
                            <td>{{ $horariom->totalEstudiantes }}</td>
                            <td>{{ $horariom->horarios->personal->RFC }}</td>
                            <td>{{ $horariom->horarios->periodos->periodo }}</td>
                            <td>{{ $horariom->tipoLugar }}</td>
                            <td>{{ $horariom->lunes }}</td>
                            <td>{{ $horariom->martes }}</td>
                            <td>{{ $horariom->miercoles }}</td>
                            <td>{{ $horariom->jueves }}</td>
                            <td>{{ $horariom->viernes }}</td>
                            
                            <td class="accion-btn">

                              
                                    {{-- <a class="btn btn-primary"
                                        href="{{ route('horariosmaterias.show', ['horariosmateria' => $horariosmateria->id]) }}">Ver</a>
                               
                                    <form method="POST" action="{{ route('horariosmaterias.destroy', ['horariosmateria' => $horhorariosmateriaariom->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger " type="submit" value="Eliminar">
                                    </form>
                    
                                    <a name="" id="" class="btn btn-secondary" role="button"
                                        href="{{ route('horariosmaterias.edit', ['horariosmateria' => $horariosmateria->id]) }}">Editar</a>
                               --}}
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
            {{ $horariosmats->links() }}
        </div>
    </div>
    @endif
@endsection
