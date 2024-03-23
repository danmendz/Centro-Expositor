<?php require_once('../../logica/Invitados.php');?>
<?php
session_start();
$id_cliente = $_SESSION["id"];

$invitado = new Invitado();
$invitados = $invitado->listaAprobados($id_cliente);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Invitados</title>
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
        <td align="center"><b>Nombre</b></td>
        <td align="center"><b>Apellido paterno</b></td>
        <td align="center"><b>Apellido materno</b></td>
        <td align="center"><b>Telefono</b></td>
        <td align="center"><b>Evento</b></td>
        <td align="center"><b>Estatus</b></td>
        <td align="center"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($invitados as $invitado) {
    ?>
    <tr>
        <td align="center"><span title="<?=$invitado->persona_nombre?>"><?=$invitado->persona_nombre?></span></td>
        <td align="center"><span title="<?=$invitado->a_paterno?>"><?=$invitado->a_paterno?></span></td>
        <td align="center"><span title="<?=$invitado->a_materno?>"><?=$invitado->a_materno?></span></td>
        <td align="center"><span title="<?=$invitado->telefono?>"><?=$invitado->telefono?></span></td>
        <td align="center"><span title="<?=$invitado->evento_nombre?>"><?=$invitado->evento_nombre?></span></td>
        <td align="center"><span title="<?=$invitado->estatus_solicitud?>"><?=$invitado->estatus_solicitud?></span></td>

        <td align="center">
          <a href="visualizar.php?id=<?=$invitado->persona_id?>" title='Ver datalles de invitado'><i class="bi bi-eye"></i></a>&nbsp;
          <a href="" onClick="confirma('eliminar.php?id_evento=<?=$invitado->evento_id ?>&id_persona=<?=$invitado->persona_id ?>'); return false;" title='Eliminar invitado'><i class="bi bi-trash3"></i></a>
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