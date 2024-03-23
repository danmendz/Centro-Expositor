<?php require_once('../../../logica/Cajon.php'); ?>
<?php
session_start();
$username = $_SESSION["username"];
$rol = $_SESSION["rol"];
$idPersona = $_SESSION["id"];

$cajon = new Cajon();
if (isset($_GET['id_cajon'])) {
	$id_cajon = $_GET['id_cajon'];

	$informacion = $cajon->infoCajon($id_cajon);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Información de cajón</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container py-2">
	<table class="table table-striped">
	    <tr>
	        <td align="center"><b>Fecha de la reserva: </b></td>
	        <td align="center"><b>Inicio: </b></td>
	        <td align="center"><b>Fin: </b></td>
	        <td align="center"><b>Numero de cajon: </b></td>
	        <td align="center"><b>Area: </b></td>
	    </tr>
	    <tr>
	        <td align="center"><span title="<?=$informacion->fecha?>"><?=$informacion->fecha?></span></td>
	        <td align="center"><span title="<?=$informacion->inicio?>"><?=$informacion->inicio?></span></td>
	        <td align="center"><span title="<?=$informacion->fin?>"><?=$informacion->fin?></span></td>
	        <td align="center"><span title="<?=$informacion->numero?>"><?=$informacion->numero?></span></td>
	        <td align="center"><span title="<?=$informacion->area_nombre?>"><?=$informacion->area_nombre?></span></td>
	    </tr>
	</table>
</div>
</body>
</html>