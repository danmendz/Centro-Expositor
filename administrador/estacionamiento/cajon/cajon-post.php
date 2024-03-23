<?php require_once('../../logica/Cajon.php');?>
<?php 
$cajonO = new Cajon();

$info = file_get_contents('php://input');
$data = json_decode($info);

$result = $cajonO->insertaRegistro($data);
echo json_encode($result);