<?php require_once('../logica/Modelo.php');?>
<?php require_once('../logica/Evento.php');?>
<?php 

$evento = new Evento();
$eventos = $evento->lista();
?>
<html>
<head>
  <title>Eventos</title>
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
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>Registrar nuevo evento</a>
  </div>
  <table class="table table-striped">
    <tr>
        <td align="center"><b>Nombre del evento</b></td>
        <td align="center"><b>Tipo de evento</b></td>
        <td align="center"><b>Personas que asistiran</b></td>
        <td align="center"><b>Acceso</b></td>
        <td align="center"><b>Comentarios</b></td>
        <td align="center"><b>Fecha de inicio</b></td>
        <td align="center"><b>Fecha de finalización</b></td>
        <td align="center"><b>Hora de inicio</b></td>
        <td align="center"><b>Hora de finalización</b></td>
        <td align="center"><b>Estatus</b></td>
        <td align="center"><b>ID de cliente</b></td>
        <td align="center"><b>Salon</b></td>
        <td align="center"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($eventos as $evento) {
    ?>
    <tr>
        <td><span title="<?=$evento->nombre?>"><?=$evento->nombre?></span></td>
        <td><span title="<?=$evento->tipo?>"><?=$evento->tipo?></span></td>
        <td><span title="<?=$evento->asistentes?>"><?=$evento->asistentes?></span></td>
        <td><span title="<?=$evento->acceso?>"><?=$evento->acceso?></span></td>
        <td><span title="<?=$evento->comentarios?>"><?=$evento->comentarios?></span></td>
        <td><span title="<?=$evento->fecha_inicio?>"><?=$evento->fecha_inicio?></span></td>
        <td><span title="<?=$evento->fecha_fin?>"><?=$evento->fecha_fin?></span></td>
        <td><span title="<?=$evento->hora_inicio?>"><?=$evento->hora_inicio?></span></td>
        <td><span title="<?=$evento->hora_fin?>"><?=$evento->hora_fin?></span></td>
        <td><span title="<?=$evento->estatus?>"><?=$evento->estatus?></span></td>
        <td><span title="<?=$evento->id_persona?>"><?=$evento->id_persona?></span></td>
        <td><span title="<?=$evento->id_salon?>"><?=$evento->id_salon?></span></td>

        <td>
          <a href="visualizar.php?id=<?=$evento->id?>" title='Ver datalles del evento'><i class="bi bi-eye"></i></a>&nbsp;
          <a href="modificar.php?id=<?=$evento->id?>" title='Editar evento'><i class="bi bi-pencil-square"></i></a>&nbsp;
          <a href="" onClick="confirma('eliminar.php?id=<?=$evento->id?>'); return false;" title='Eliminar evento'><i class="bi bi-trash"></i></a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</td>
</body>
</html>