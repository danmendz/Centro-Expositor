<?php
session_start();
$username = $_SESSION["username"];
$rol = $_SESSION["rol"];

if ($rol != 'admin') {
  header('Location:'.'../login/login.php');
}

if (!isset($username) || empty($username)) {
  header('Location:'.'../login/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home admin</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<nav class="navbar header">
  <div class="container-fluid">
    <li><h1>Panel de administrador <?=$username?></h1></li>

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
        <a href="../index.php">
        <h1 class="bi bi-house-fill" style="margin: 5px; color: #FFA800; font-size: 30px;" title="Inicio"></h1>
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
        <h1 class="bi bi-person-circle" style="color: #FFA800; margin-right: 40px; margin-top: 3px; font-size: 30px;" title="Mi perfil"></h1>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="../homes/mi-informacion.php">Mi perfil</a>
          </li>
          <li>
            <a class="dropdown-item" href="../login/logout.php">Cerrar sesión</a>
          </li>
        </ul>
      </div>

    </div>
    
  </div>
</nav>

  <div class='admin_options_and_overview'>
    <div class='left_border_box'>

      <div class="dropdownOptions">
        <button class="category">Personas</button>
          <div class="dropdown-content">
            <a href='persona/index.php' data-page='persona/index.php'>Lista de personas</a>
          </div>
      </div>

      <div class="dropdownOptions">
        <button class="category">Eventos</button>
          <div class="dropdown-content">
            <a href='evento/index.php' data-page='evento/index.php'>Lista de eventos</a>
            <a href='reservas/index.php' data-page='reservas/index.php'>Lista de reservas</a>
          </div>
      </div>

      <div class="dropdownOptions">
        <button class="category">Salones</button>
          <div class="dropdown-content">
            <a href='salon/index.php' data-page='salon/index.php'>Lista de salones</a>
          </div>
      </div>

      <div class="dropdownOptions">
        <button class="category">Estacionamiento</button>
          <div class="dropdown-content">
            <a href='estacionamiento/area/index.php' data-page='estacionamiento/area/index.php'>Areas</a>
            <a href='estacionamiento/reserva/pendientes.php' data-page='estacionamiento/reserva/pendientes.php'>Reservas de cajón pendientes</a>
            <a href='estacionamiento/reserva/reservados.php' data-page='estacionamiento/reserva/reservados.php'>Reservas de cajón aprobadas</a>
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