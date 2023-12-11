<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/index.css?1.0')}}" media="all" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info"">
        <div class=" container-fluid">
        <a class="navbar-brand" href="#">SGI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Horarios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Carga de Archivos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Catalogos
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route ('alumnos.index')}}">Alumnos</a></li>
                        <li><a class="dropdown-item" href="{{route ('deptos.index')}}">Departamentos</a></li>
                        <li><a class="dropdown-item" href="{{route ('reticulas.index')}}">Reticulas</a></li>
                        <li><a class="dropdown-item" href="{{route ('materias.index')}}">Materias</a></li>
                        <li><a class="dropdown-item" href="{{route ('periodos.index')}}">Periodos</a></li>
                        <li><a class="dropdown-item" href="{{route ('puestos.index')}}">Puestos</a></li>
                        <li><a class="dropdown-item" href="{{route ('personal.index')}}">Personal</a></li>
                        <li><a class="dropdown-item" href="{{route ('personalplazas.index')}}">Personal Plazas</a></li>
                        <li><a class="dropdown-item" href="{{route ('lugares.index')}}">Lugares</a></li>
                        <li><a class="dropdown-item" href="{{route ('plazas.index')}}">Plazas</a></li>
                        <li><a class="dropdown-item" href="{{route ('carreras.index')}}">Carreras</a></li>
                        <li><a class="dropdown-item" href="{{route ('horarios.index')}}">Horarios</a></li>
                        <li><a class="dropdown-item" href="{{route ('horariosmaterias.index')}}">Horarios de Materias</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/viewmodal">Something else here</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Ayuda</a>
                </li>



            </ul>

            <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->

            <!-- Boton LOGOUT -->
            @auth
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->email }}
                </button>
                <ul class="dropdown-menu dropdown-menu bg-info">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault(); this.closest('form').submit();">Cerrar Sesion</a>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
            @guest
            <div class="bg-primary" style="padding: 5px; border-radius: 10px 0px 10px 0px;">
                <a href="/login" style="color:black; text-decoration: none;">Iniciar Sesion</a>
            </div>
            @endguest

        </div>
        </div>
    </nav>





    <div class="row">
        <div class="col">
            @yield("contenido1")
        </div>
    </div>




</body>

</html>