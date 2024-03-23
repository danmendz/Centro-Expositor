<?php
session_start();
$username = $_SESSION["username"];
$rol = $_SESSION["rol"];

if ($rol != 'usuario') {
  header('Location:'.'../../login/login.php');
}

if (!isset($username) || empty($username)) {
  header('Location:'.'../../login/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuario</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<nav class="navbar" style="background: #FFA800; border-bottom: 2px solid #000000">
  <div class="container-fluid">
    <li><h1>Bienvenido <?=$username?></h1></li>

    <div class="d-flex align-items-center">

      <div class="son">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <a href="../../index.php">
        <h1 class="bi bi-house-fill" style="margin: 5px; color: #ffff; font-size: 30px;" title="Inicio"></h1>
        </a>
      </button>
      </div>

      <div class="dropdown son">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <h1 class="bi bi-person-circle" style="color: #ffff; margin-right: 40px; margin-top: 3px; font-size: 30px;" title="Mi perfil"></h1>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <!-- <li>
            <a class="dropdown-item" href="#">Mi perfil</a>
          </li> -->
          <li>
            <a class="dropdown-item" href="../../login/logout.php">Cerrar sesión</a>
          </li>
        </ul>
      </div>

    </div>
    
  </div>
</nav>

  <div class='admin_options_and_overview'>
    <div class='left_border_box'>

      <div class="dropdownOptions">
        <button class="category">Eventos</button>
          <div class="dropdown-content">
            <a href='evento/insertar.php' data-page='evento/insertar.php'>Reservar evento</a>
            <a href='reservas/index.php' data-page='reservas/index.php'>Mis reservas</a>
            <a href='evento/eventos.php' data-page='evento/eventos.php'>Eventos disponibles</a>
            <a href='invitados/aprobaciones.php' data-page='invitados/aprobaciones.php'>Aprobación</a>
          </div>
      </div>

      <div class="dropdownOptions">
        <button class="category">Estacionamiento</button>
          <div class="dropdown-content">
            <a href='estacionamiento/areas/acceso.php' data-page='estacionamiento/areas/acceso.php'>Areas de acceso</a>
            <a href='estacionamiento/reservas/pendientes.php' data-page='estacionamiento/reservas/pendientes.php'>Reservas pendientes</a>
            <a href='estacionamiento/reservas/aprobadas.php' data-page='estacionamiento/reservas/aprobadas.php'>Reservas aprobadas</a>
            <a href='estacionamiento/cajones/reservados.php' data-page='estacionamiento/cajones/reservados.php'>Cajones reservados</a>
          </div>
      </div>
    </div>

    <div class='right_border_box'>
        <div class='all'>
          <div class='scroll_box'>
            <iframe id="dynamicContent" src="about:blank" frameborder="0" scrolling="auto"></iframe>
          </div>
        </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    $(".dropdownOptions a").click(function(e) {
        e.preventDefault();
        var page = $(this).data("page");
        if (page) {
            // Cargar la página seleccionada en el iframe
            $("#dynamicContent").attr("src", page);
        }
    });
  });
  </script>

</body>
</html>