<?php require_once('../../logica/Modelo.php');?>
<?php require_once('../../logica/Evento.php');?>
<?php
session_start();
$id_cliente = $_SESSION["id"];

$evento = new Evento();
$eventos = $evento->lista($id_cliente);
?>
<html>
<head>
  <title>Eventos</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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
      top.location = miurl;
    }
  }
  </script>
</head>
<body>
<?php
if (isset($_REQUEST['mensaje'])) {
    $mensaje = $_REQUEST['mensaje'];
    if ($mensaje === 'exito') {
      echo '
      <script>
      alertify.notify("Actualizado correctamente", "success", 5, function(){  console.log("dismissed"); });
      </script>
      ';
    } elseif ($mensaje === 'error') {
      echo '
      <script>
      alertify.notify("Error al actualizar", "error", 5, function(){  console.log("dismissed"); });
      </script>
      ';
    }
}
?>

<div class="container py-2">
  <table class="table table-striped">
    <tr>
        <td align="center"><b>Nombre del evento</b></td>
        <td align="center"><b>Personas que asistiran</b></td>
        <td align="center"><b>Acceso</b></td>
        <td align="center"><b>Fecha de inicio</b></td>
        <td align="center"><b>Fecha de finalización</b></td>
        <td align="center"><b>Hora de inicio</b></td>
        <td align="center"><b>Hora de finalización</b></td>
        <td align="center"><b>Estatus</b></td>
        <td align="center"><b>Salon</b></td>
        <td align="center"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($eventos as $evento) {
    ?>
    <tr>
        <td><span title="<?=$evento->nombre?>"><?=$evento->nombre?></span></td>
        <td><span title="<?=$evento->asistentes?>"><?=$evento->asistentes?></span></td>
        <td><span title="<?=$evento->acceso?>"><?=$evento->acceso?></span></td>
        <td><span title="<?=$evento->fecha_inicio?>"><?=$evento->fecha_inicio?></span></td>
        <td><span title="<?=$evento->fecha_fin?>"><?=$evento->fecha_fin?></span></td>
        <td><span title="<?=$evento->hora_inicio?>"><?=$evento->hora_inicio?></span></td>
        <td><span title="<?=$evento->hora_fin?>"><?=$evento->hora_fin?></span></td>
        <td><span title="<?=$evento->estatus?>"><?=$evento->estatus?></span></td>
        <td><span title="<?=$evento->salon_nombre?>"><?=$evento->salon_nombre?></span></td>

        <td>
          <a href="visualizar.php?id=<?=$evento->id?>" title='Ver datalles del evento'><i class="bi bi-eye"></i></a>&nbsp;
          <a href="modificar.php?id=<?=$evento->id?>" title='Editar evento'><i class="bi bi-pencil-square"></i></a>&nbsp;
          <a href="" onClick="confirma('eliminar.php?id=<?=$evento->id?>&id_salon=<?=$evento->id_salon?>'); return false;" title='Eliminar evento'><i class="bi bi-trash"></i></a>
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