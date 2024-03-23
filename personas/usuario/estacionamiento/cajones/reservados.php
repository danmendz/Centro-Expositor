<?php require_once('../../../logica/ReservaCajon.php'); ?>
<?php
session_start();
$username = $_SESSION["username"];
$rol = $_SESSION["rol"];
$idPersona = $_SESSION["id"];

$cajon = new ReservaCajon();
$cajones = $cajon->cajonesReservados($idPersona);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cajones reservados</title>
</head>
<body>
	<h1>Cajones reservados</h1>
	<?php
	foreach ($cajones as $cajon) {
	?>

	<div style="width: 100px; height: 100px; background-color: orange; display: inline-block; margin: 5px;   margin-bottom: 30px;">
        <h1><?= $cajon->numero ?></h1>
		<a href="visualizar.php?id_cajon=<?=$cajon->id ?>"><input type="button" name="Informacion" title="Informacion del cajon"></a>
	</div>

	<?php
	}
	?>
</body>
</html>