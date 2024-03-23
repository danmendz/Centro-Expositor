<?php require_once('../logica/Persona.php');?>
<?php 
$persona = new Persona();
$personas = $persona->lista();
?>
<html>
<head>
  <title>Personas</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
  body {
    margin: 0 auto;
    padding: 0;
    height: 100vh;
    background-color: transparent;
    background-image: url('../images/fondo1.png');
    background-size: contain;
    background-blend-mode: luminosity;
  }
  .table{
    box-shadow: 10, 10, 100px, 100px black;
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
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i>Registrar nueva persona</a>
  </div>
  <table class="table table-striped">
    <tr>
      <td align="center"><b>Nombre</b></td>
      <td align="center"><b>Appellido paterno</b></td>
      <td align="center"><b>Appellido materno</b></td>
      <td align="center"><b>Fecha de nacimiento</b></td>
      <td align="center"><b>Correo electronico</b></td>
      <td align="center"><b>Telefono</b></td>
      <td align="center"><b>Username</b></td>
      <td align="center"><b>Password</b></td>
      <td align="center"><b>Rol</b></td>
      <td align="center"><b>Acciones</b></td>
    </tr>
    <?php
    foreach ($personas as $persona) {
    ?>
    <tr>
        <td><span title="<?=$persona->nombre?>"><?=$persona->nombre?></span></td>
        <td><span title="<?=$persona->a_paterno?>"><?=$persona->a_paterno?></span></td>
        <td><span title="<?=$persona->a_materno?>"><?=$persona->a_materno?></span></td>
        <td><span title="<?=$persona->fecha_nac?>"><?=$persona->fecha_nac?></span></td>
        <td><span title="<?=$persona->correo?>"><?=$persona->correo?></span></td>
        <td><span title="<?=$persona->telefono?>"><?=$persona->telefono?></span></td>
        <td><span title="<?=$persona->username?>"><?=$persona->username?></span></td>
        <td><span title="<?=$persona->password?>"><?=$persona->password?></span></td>
        <td><span title="<?=$persona->rol?>"><?=$persona->rol?></span></td>

        <td>
          <a href="visualizar.php?id=<?=$persona->id?>" title='Ver datalles del persona'><i class="bi bi-eye"></i></a>&nbsp;
          <a href="modificar.php?id=<?=$persona->id?>" title='Editar persona'><i class="bi bi-pencil-square"></i></a>&nbsp;
          <a href="" onClick="confirma('eliminar.php?id=<?=$persona->id?>'); return false;" title='Eliminar persona'><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>

</body>
</html>