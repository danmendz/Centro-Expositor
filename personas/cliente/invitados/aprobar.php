<?php
require_once('../../logica/Invitados.php');

$invitado = new Invitado();

if (isset($_GET['id_evento']) && isset($_GET['id_persona'])) {
    $id_evento = $_GET['id_evento'];
    $id_persona = $_GET['id_persona'];

    $invitado->aprobarInvitado($id_persona, $id_evento);
    header('Location: pendientes.php?mensaje=aprobado');
}
?>