<?php
require_once('../logica/Modelo.php');
require_once('../logica/Persona.php');

$persona = new Persona();
$usua = array();

$idEvento = intval($_GET['id']);

$area = $persona->obtenerAreaEvento($idEvento);

if ($area) {
    $idArea = $area->id;
    $cajones = $persona->obtenerCajonArea($idArea);
    $usua['cajones'] = $cajones;
    header("HTTP/1.1 200 OK");
} else {
    $usua['cajones'] = null;
}

header("Content-type: application/json; charset=UTF-8");
echo json_encode($usua);
?>
