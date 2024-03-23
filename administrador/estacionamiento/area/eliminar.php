<?php require_once('../../logica/Area.php'); ?>
<?php 

$area = new Area();
if (isset($_GET['id_area'])) {
    $area->eliminaRegistro($_GET['id_area']);
}

header("Location: ../../index.php");
?>