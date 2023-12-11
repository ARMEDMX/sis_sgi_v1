@extends("plantillas/plantilla1")

@section("contenido1")

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Mi Sitio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <!-- Opción para mostrar el segundo menú -->
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="mostrarSubMenu();">Mostrar Submenú</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Segundo menú (inicialmente oculto) -->
<div id="segundoMenu" style="display: none;">
    <ul class="list-unstyled">
        <li><a href="#" onclick="mostrarVentanaEmergente('Opción 1');">Opción 1</a></li>
        <li><a href="#" onclick="mostrarVentanaEmergente('Opción 2');">Opción 2</a></li>
        <li><a href="#" onclick="mostrarVentanaEmergente('Opción 3');">Opción 3</a></li>
    </ul>
</div>

<!-- Ventana emergente (inicialmente oculta) -->
<div id="ventanaEmergente" style="display: none; padding: 20px;">
    <h3 id="ventanaTitulo">Título de la Ventana</h3>
    <p>Contenido de la ventana emergente.</p>
    <button onclick="cerrarVentanaEmergente();" class="btn btn-danger">Cerrar Ventana</button>
</div>


<script>
    // Función para mostrar el segundo menú
    function mostrarSubMenu() {
        document.getElementById('segundoMenu').style.display = 'block';
    }

    // Función para mostrar la ventana emergente
    function mostrarVentanaEmergente(opcion) {
        document.getElementById('ventanaTitulo').textContent = opcion;
        document.getElementById('ventanaEmergente').style.display = 'block';
    }

    // Función para cerrar la ventana emergente
    function cerrarVentanaEmergente() {
        document.getElementById('ventanaEmergente').style.display = 'none';
    }
</script>

@endsection