<?php require_once('../../logica/ReservaCajon.php');?>
<?php
$reserva = new ReservaCajon();

if (isset($_GET['id_cajon']) && isset($_GET['id_persona'])) {
    $id_cajon = $_GET['id_cajon'];
    $id_persona = $_GET['id_persona'];

    $reserva->aprobarReserva($id_persona, $id_cajon);
    header('Location: pendientes.php?mensaje=aprobado');
}
?>