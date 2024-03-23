<?php require_once('../../../logica/Area.php'); ?>
<?php
session_start();
$username = $_SESSION["username"];
$rol = $_SESSION["rol"];
$idPersona = $_SESSION["id"];

$area = new Area();
$areas = $area->areasAcceso($idPersona);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Areas</title>
</head>
<body>
	<h1>Áreas de acceso</h1>
	<div>
		<?php
		foreach ($areas as $area) {
		?>

		<div style="width: 200px; height: 200px; background-color: red; display: inline-block;">
			<h1><?=$area->nombre?></h1>
			<!-- <a href="aprobar.php?id_area=<?=$area->id ?>&id_persona=<?=$idPersona ?>"><input type="button" name="Informacion" title="Informacion del area"></a> -->
			<a href="../cajones/index.php?id_area=<?=$area->id ?>&id_persona=<?=$idPersona ?>"><input type="button" name="Cajones" title="Cajones"></a>
		</div>

		<?php
		}
		?>
	</div>
</body>
</html>