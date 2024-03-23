<?php require_once('../../logica/Area.php'); ?>
<?php
$area = new Area();
if (isset($_POST['id'])) {
    $area->insertaRegistro();
}
?>
<html>
<head>
    <title>Insertar área</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-color: transparent;
      background-image: url('../images/fondo1.png');
      background-size: contain;
      background-blend-mode: luminosity;
    }
    </style>
</head>
<body>
<div class="container py-2">
    <div class="form-group">
        <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de áreas</a>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php">
    <input type="hidden" name="id" value="0">
  	<table class="table">

    <tr>
        <td>
        	<label class="control-label">Nombre del área</label>
        	<input type="text" name="nombre" value="" class="form-control">
       	</td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Capacidad</label>
            <input type="number" name="capacidad" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
			<div class="form-group">
    			<button type="submit" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Guardar</button>
			</div>
        </td>
    </tr>
    </table>
    </form>
</div>
</body>
</html>