<?php require_once('../../logica/Area.php'); ?>
<?php
$area = new Area();
$areas = $area->listarTodo();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Areas</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
  body {
    margin: 0;
    padding: 20px;
    height: 100vh;
    background-color: transparent;
    background-size: contain;
    background-blend-mode: luminosity;
  }
  </style>
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de eliminar este elemento?")
      if (question !="0") {
          top.location = miurl;   
      }
  }
  </script>
</head>
<body>
  <h1>Áreas</h1>
  <div class="form-group">
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>Registrar nueva área</a>
  </div>
  <div>
    <?php
    foreach ($areas as $area) {
    ?>

    <div style="width: 200px; height: 200px; background-color: red; display: inline-block; margin: 10px;">
      <h1><?=$area->nombre?></h1>
      <a href="" onClick="confirma('eliminar.php?id_area=<?=$area->id?>'); return false;"><input type="button" name="Eliminar" title="Eliminar area"></a>
      <a href="modificar.php?id_area=<?=$area->id ?>"><input type="button" name="Modificar" title="Modificar area"></a>
      <a href="visualizar.php?id_area=<?=$area->id ?>"><input type="button" name="Informacion" title="Informacion del area"></a>
      <a href="../cajon/index.php?id_area=<?=$area->id ?>"><input type="button" name="Cajones" title="Cajones"></a>
    </div>

    <?php
    }
    ?>
  </div>
</body>
</html>