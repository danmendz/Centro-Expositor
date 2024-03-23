<?php require_once('../../logica/Cajon.php');?>
<?php 
$cajonO = new Cajon();

$id = $_GET['id'];
$cajon = $cajonO->listar($id);

echo json_encode($cajon);