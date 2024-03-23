<?php require_once('../logica/Reserva.php');?>
<?php 

$reserva = new Reserva();
if (isset($_GET['id'])) {
    $reserva->eliminaRegistro($_GET['id']);
}

header("Location: ../index.php");
?>