<?php require_once('../../logica/ReservaCajon.php');?>
<?php 
$reserva = new ReservaCajon();
$reservas = $reserva->lista();
?>
<html>
<head>
  <title>Reservas de cajón</title>
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

  /*.bi {
    display: inline-block;
    font-size: 20px;
    justify-content: space-between;
    text-decoration: none;
    color: black;
  }*/

  .bi-check-lg {
    color: green;
  }

  .bi-trash3 {
    color: red;
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
  <br>
  <div class="form-group">
  </div>
  <table class="table table-striped">
    <tr>
        <td align="center"><b>ID</b></td>
        <td align="center"><b>ID persona</b></td>
        <td align="center"><b>ID cajon</b></td>
        <td align="center"><b>Estatus</b></td>
        <td align="center"><b>Fecha</b></td>
        <td align="center"><b>Inicio</b></td>
        <td align="center"><b>Fin</b></td>
        <td align="center"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($reservas as $reserva) {
    ?>
    <tr>
        <td align="center"><span title="<?=$reserva->id?>"><?=$reserva->id?></span></td>
        <td align="center"><span title="<?=$reserva->id_persona?>"><?=$reserva->id_persona?></span></td>
        <td align="center"><span title="<?=$reserva->id_cajon?>"><?=$reserva->id_cajon?></span></td>
        <td align="center"><span title="<?=$reserva->estatus?>"><?=$reserva->estatus?></span></td>
        <td align="center"><span title="<?=$reserva->fecha?>"><?=$reserva->fecha?></span></td>
        <td align="center"><span title="<?=$reserva->inicio?>"><?=$reserva->inicio?></span></td>
        <td align="center"><span title="<?=$reserva->fin?>"><?=$reserva->fin?></span></td>

        <td align="center">
          <a href="visualizar.php?id=<?=$reserva->id?>" title='Ver datalles de reserva'><i class="bi bi-eye"></i></a>&nbsp;
          <a href="" onClick="confirma('rechazar.php?id_cajon=<?=$reserva->id_cajon ?>&id_persona=<?=$reserva->id_persona ?>'); return false;" title='Rechazar reserva'><i class="bi bi-trash3"></i></a>
          <a href="insertar.php?id_cajon=<?=$reserva->id_cajon ?>&id_persona=<?=$reserva->id_persona ?>" title='Aprobar reserva'><i class="bi bi-check-lg"></i></a>&nbsp;
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