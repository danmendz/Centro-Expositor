<?php require_once('../logica/Salon.php');?>
<?php 

$salon = new Salon();
$salones = $salon->lista();
?>
<html>
<head>
  <title>Salones</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de eliminar este elemento?")
      if (question !="0"){
          top.location = miurl;   }
  }
  </script>
</head>
<body>
<div class="container py-2">
  <div class="form-group">
    <a href="salon-post.html" class="btn btn-success"><i class="bi bi-plus-circle"></i>Registrar nuevo salon</a>
  </div>
  <table class="table table-striped">
    <tr>
        <td align="center"><b>Nombre del salon</b></td>
        <td align="center"><b>Capacidad</b></td>
        <td align="center"><b>Precio</b></td>
        <td align="center"><b>Tamaño</b></td>
        <td align="center"><b>Pais</b></td>
        <td align="center"><b>Estado</b></td>
        <td align="center"><b>Ciudad</b></td>
        <td align="center"><b>Direccion</b></td>
        <td align="center"><b>Estatus</b></td>
        <td align="center"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($salones as $salon) {
    ?>
    <tr>
        <td><span title="<?=$salon->nombre?>"><?=$salon->nombre?></span></td>
        <td><span title="<?=$salon->capacidad?>"><?=$salon->capacidad?></span></td>
        <td><span title="<?=$salon->precio?>"><?=$salon->precio?></span></td>
        <td><span title="<?=$salon->tamano?>"><?=$salon->tamano?></span></td>
        <td><span title="<?=$salon->pais?>"><?=$salon->pais?></span></td>
        <td><span title="<?=$salon->estado?>"><?=$salon->estado?></span></td>
        <td><span title="<?=$salon->ciudad?>"><?=$salon->ciudad?></span></td>
        <td><span title="<?=$salon->direccion?>"><?=$salon->direccion?></span></td>
        <td><span title="<?=$salon->estatus?>"><?=$salon->estatus?></span></td>

        <td>
          <a href="visualizar.php?id=<?=$salon->id?>" title='Ver datalles del salon'><i class="bi bi-eye"></i></a>&nbsp;
          <a href="modificar.php?id=<?=$salon->id?>" title='Editar salon'><i class="bi bi-pencil-square"></i></a>&nbsp;
          <a href="" onClick="confirma('eliminar.php?id=<?=$salon->id?>'); return false;" title='Eliminar salon'><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</td>
</body>
</html>