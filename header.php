<?php 
session_start();
$username = $_SESSION["username"];
?>
<header style="background-color: black; " class="fixed-top" id="menu-principal">
  <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="#inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#sobre">Sobre nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contacto">Contáctenos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#salones">Salones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#eventos">Cartelera</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="confirmar()">Reservar</a>
        </li>

      </ul>
    </div>

    <a href="#" onclick="confirmar()" class="get-started-btn">Iniciar sesión</a>
  </nav>
</header>
<script type="text/javascript">
    function confirmar() {
        // Verificar si la sesión ya está iniciada
        <?php if( isset($_SESSION["username"]) ) : ?>
            // Si el usuario ya ha iniciado sesión, redirigirlo a su página principal
            <?php if ($_SESSION["rol"] == 'usuario') : ?>
                window.location.href = 'personas/usuario/index.php';

            <?php elseif ($_SESSION["rol"] == 'cliente') : ?>
                window.location.href = 'personas/cliente/index.php';

            <?php elseif ($_SESSION["rol"] == 'admin') : ?>
                window.location.href = 'administrador/index.php';

            <?php elseif ($_SESSION["rol"] == 'trabajador') : ?>
                window.location.href = 'personas/trabajador/index.php';
            <?php endif; ?>
        <?php else : ?>
            // Si la sesión no existe, redirigir al inicio de sesión
            window.location.href = 'login/login.php';
        <?php endif; ?>
    }
</script>