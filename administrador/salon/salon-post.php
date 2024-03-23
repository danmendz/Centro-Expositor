<?php require_once('../logica/Salon.php');?>
<?php 
$salonO = new Salon();

$info = file_get_contents('php://input');
$data = json_decode($info);

$result = $salonO->insertaRegistro($data);
echo json_encode($result);