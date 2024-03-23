<?php require_once('../../logica/Evento.php');?>
<?php 

$evento = new Evento();
if (isset($_GET['id']) && isset($_GET['id_salon'])) {
    $evento->eliminaRegistro($_GET['id'], $_GET['id_salon']);
}

header("Location: ../index.php");
?>