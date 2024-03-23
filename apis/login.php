<?php
require_once('../logica/Modelo.php');
require_once('../logica/Persona.php');

$persona = new Persona();

$usua = array();
$areasEventos = array();
$cajonesAreas = array();

$username = $_GET['user'];
$pass = $_GET['pass'];
$password = md5($pass);

$usuarioRecuperado = $persona->recuperaUsuario($username, $password);

if ($usuarioRecuperado) {
    $eventosUsuario = $persona->obtenerEventosUsuario($usuarioRecuperado->id);

    $usua['usuario'] = $usuarioRecuperado;
    $usua['eventos'] = $eventosUsuario;
    header("HTTP/1.1 200 OK");

} else {
    $usua['usuario'] = null;
    header("HTTP/1.1 403 Forbidden");
    // $usua['error'] = "Usuario no encontrado";
}

header("Content-type: application/json; charset=UTF-8");
echo json_encode($usua);
?>