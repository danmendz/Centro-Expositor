<?php
require_once('../../logica/Reserva.php');

$reserva = new Reserva();

if (isset($_GET['id_evento'])) {
    $id_evento = $_GET['id_evento'];
    $reserva->aprobarEvento($id_evento);
    header('Location: index.php?mensaje=registro_exitoso');
}
?>