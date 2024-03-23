<?php require_once('../logica/Persona.php');?>
<?php
$errores = array();
$persona = new Persona();

if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $password = md5($pass);

  if ($persona->recuperaUsuarioO($username)) {
    if ($persona->password == $password) {
        
    session_start();
    $_SESSION["id"] =  $persona->id;
    $_SESSION["rol"] = $persona->rol;
    $_SESSION["username"] = $persona->username;

    redirigirSegunRol($persona->rol);

    } else {
      header('Location: login.php?error=credenciales');
    }
  } else {
    header('Location: login.php?error=credenciales');
  }
}

function redirigirSegunRol($rol) {
  switch ($rol) {
    case 'usuario':
      header('Location: ../personas/usuario/index.php');
      break;
    case 'cliente':
      header('Location: ../personas/cliente/index.php');
      break;
    case 'admin':
      header('Location: ../administrador/index.php');
      break;
    case 'trabajador':
      header('Location: ../trabajador/index.php');
      break;
    default:
      header('Location: login.php?error=credenciales');
  }
  exit();
}
?>