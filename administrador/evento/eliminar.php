<?php require_once('../logica/Evento.php');?>
<?php 

$evento = new Evento();
if (isset($_GET['id'])) {
    $evento->eliminaRegistro($_GET['id']);
}

header("Location: ../index.php");
?>