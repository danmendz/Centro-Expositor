<?php
include_once( 'conexion.php');
include_once( 'Persona.php');

$user = $_GET['userParam'];
$pass = $_GET['passParam'];

$estatus = array();
$usuario = new Usuario();

$sql = "SELECT
        id,nombre,a_paterno,a_materno,fecha_nac,correo,telefono,username,password,rol
        FROM persona
        WHERE username = '$user'
        AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = $result->fetch_assoc()) {

        $usuario->setId($row['id']);
        $usuario->setId($row['nombre']);
        $usuario->setAp($row['a_paterno']);
        $usuario->setAm($row['a_materno']);
        $usuario->setAm($row['fecha_nac']);
        $usuario->setCorreo($row['correo']);
        $usuario->setCorreo($row['telefono']);
        $usuario->setUsername($row['username']);
        $usuario->setCorreo($row['rol']);

        $estatus['user'] = $usuario;

        header("HTTP/1.1 200 OK");
        // print_r($estatus);

    } 

}else {

        $estatus['user'] = null;
        header("HTTP/1.1 403 Forbidden");

        // print_r($estatus);
    }

echo json_encode($estatus);
?>