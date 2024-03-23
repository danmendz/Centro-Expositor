<?php
require_once('../../logica/Invitados.php');

$invitado = new Invitado();

if (isset($_GET['id_persona']) && isset($_GET['id_evento'])) {
    $id_persona = $_GET['id_persona'];
    $id_evento = $_GET['id_evento'];

    $invitado->eliminaRegistro($id_persona, $id_evento);
    header('Location: ../index.php?mensaje=rechazado');
}
?>