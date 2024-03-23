<?php
require_once('../logica/Modelo.php');
require_once('../logica/Persona.php');

$persona = new Persona();
$eventos = array();
$areas = array();
$cajones = array();

$idPersona = $_GET['id'];

$eventosUsuario = $persona->obtenerEventosUsuario($idPersona);

if ($eventosUsuario) {
	

    foreach ($eventosUsuario as $eventoUsuario) {
        $eventoId = $eventoUsuario->id;
		$areasEvento = $persona->obtenerAreaEvento($eventoId);
		$areas[$eventoId] = $areasEvento;

		foreach ($areasEvento as $areaE) {
			$areaId = $areaE->id;
			$cajonesArea = $persona->obtenerCajonArea($areaId);
			$cajones[$areaId] = $cajonesArea;
		}
    }

	$eventos['eventos'] = $eventosUsuario;
	$eventos['areas'] = $areas;
	$eventos['cajones'] = $cajones;
} else {
	$eventos['eventos'] = null;
}

header("Content-type: application/json; charset=UTF-8");
echo json_encode($eventos);
?>