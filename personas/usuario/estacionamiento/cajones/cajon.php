<?php require_once('../../../logica/Cajon.php'); ?>
<?php
session_start();
$username = $_SESSION["username"];
$rol = $_SESSION["rol"];
$idPersona = $_SESSION["id"];

$cajon = new Cajon();

if (isset($_GET['id_area'])) {
	$id_area = $_GET['id_area'];
	$cajones = $cajon->listar($id_area);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cajones</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

	<style>
	body {
	margin: 20px;
	padding: 0;
	height: 100vh;
	background-color: transparent;
	background-size: contain;
	background-blend-mode: luminosity;
	}

	table {
	border-collapse: separate;
	border-spacing: 10px;
	}

	td {
	padding: 10px;
	}
	</style>
</head>
<body>
	<h1>Cajones</h1>
	<table>
	<tr>
	  <td>
	    <h4>Disponible</h4>
	  </td>
	  <td>
	    <h4>Ocupado</h4>
	  </td>
	  <td>
	    <h4>Reservado</h4>
	  </td>
	</tr>
	<tr>
	  <td>
	    <div style="width: 40px; height: 40px; background-color: green; margin: 0 auto;"></div>
	  </td>
	  <td>
	    <div style="width: 40px; height: 40px; background-color: red; margin: 0 auto;"></div>
	  </td>
	  <td>
	    <div style="width: 40px; height: 40px; background-color: orange; margin: 0 auto;"></div>
	  </td>
	</tr>
	</table>
	<br>

	<?php
	foreach ($cajones as $cajon) {

    switch ($cajon->estatus) {
        case 1:
            $color = 'red';
            break;
        case 2:
            $color = 'orange';
            break;
        default:
        	$color = 'green';
        	break;
    }
	?>
	    <div style="width: 100px; height: 100px; background-color: <?= $color ?>; display: inline-block; margin: 5px;   margin-bottom: 30px;">
	        <h1><?= $cajon->numero ?></h1>
	        
	        <form method="post" action="reservar.php">
	            <input type="hidden" name="id_cajon" value="<?= $cajon->id ?>">
	            <input type="hidden" name="id_persona" value="<?= $idPersona ?>">
	            <button type="submit" name="reservar" class="btn btn-primary" style="width:100px; height: 50px;" title="Reservar cajon">Reservar
	            </button>
	        </form>
	    </div>
	<?php
	}
	?>
</body>
</html>