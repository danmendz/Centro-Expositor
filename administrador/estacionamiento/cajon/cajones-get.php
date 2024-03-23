<?php require_once('../../logica/Cajon.php');?>
<?php 
$cajonO = new Cajon();

$cajones = $cajonO->mostrar();

echo json_encode($cajones);