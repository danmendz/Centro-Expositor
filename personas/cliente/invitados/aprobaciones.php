<?php require_once('../../logica/Modelo.php');?>
<?php require_once('../../logica/Invitados.php');?>

<?php
session_start();
$id_persona = $_SESSION["id"];

$modelo = new Modelo();

$invitado = new Invitado();
$invitados = $invitado->aprobaciones($id_persona);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitudes Aprobadas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style type="text/css">
    #btnCancelar {
      border-radius: 20px;
      border: 1px solid #FFB424;
      background-color: #FFB424;
      color: #FFFFFF;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
      position: absolute;
      top: 0;
      left: 0;
      margin: 10px;
    }

    h1, h2{
      text-align: center;
    }
    </style>
</head>
<body>
<div class="container py-2">
  <br>
  <div class="form-group"><h3 align="center">Solicitudes aprobadas para participar</h3></div>
  <table class="table table-striped">
    <tr>
        <th align="center"><b>Nombre del evento</b></th>
        <th align="center" colspan="3"><b>Organizador</b></th>
        <th align="center"><b>Fecha de inicio</b></th>
        <th align="center"><b>Fecha de finalización</b></th>
        <th align="center"><b>Hora de inicio</b></th>
        <th align="center"><b>Hora de finalización</b></th>
        <th align="center"><b>Salón de reunión</b></th>
    </tr>
    <?php
    if (!empty($invitados)) {
        foreach ($invitados as $invitado) {
    ?>
    <tr>
        <td align="center"><span title="<?=$invitado->evento_nombre?>"><?=$invitado->evento_nombre?></span></td>
        <td align="center"><span title="<?=$invitado->persona_nombre?>"><?=$invitado->persona_nombre?></span></td>
        <td align="center"><span title="<?=$invitado->a_paterno?>"><?=$invitado->a_paterno?></span></td>
        <td align="center"><span title="<?=$invitado->a_materno?>"><?=$invitado->a_materno?></span></td>
        <td align="center"><span title="<?=$invitado->fecha_inicio?>"><?=$invitado->fecha_inicio?></span></td>
        <td align="center"><span title="<?=$invitado->fecha_fin?>"><?=$invitado->fecha_fin?></span></td>
        <td align="center"><span title="<?=$invitado->hora_inicio?>"><?=$invitado->hora_inicio?></span></td>
        <td align="center"><span title="<?=$invitado->hora_fin?>"><?=$invitado->hora_fin?></span></td>
        <td align="center"><span title="<?=$invitado->salon_nombre?>"><?=$invitado->salon_nombre?></span></td>
    </tr>
    <?php
    } 
    }
    ?>
  </table>
</div>
</body>
</html>