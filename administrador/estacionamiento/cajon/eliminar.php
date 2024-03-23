<?php require_once('../logica/Salon.php');?>
<?php 

$salon = new Salon();
if (isset($_GET['id'])) {
    $salon->eliminaRegistro($_GET['id']);
}

header("Location: ../index.php");
?>