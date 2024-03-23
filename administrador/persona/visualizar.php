<?php require_once('../logica/Persona.php');?>
<?php 

$persona = new  Persona();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $persona->id = $_GET['id'];
    $persona->recuperaRegistro($persona->id);
}
?>
<html>
<head>
    <title>Visualizar personas</title>
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

    <script>
        function cerrarVentana() {
            window.close(); // Cierra la ventana actual
        }
    </script>

</head>
<body>
    <div class="container py-2">
        <div class="form-group">
            <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de personas</a>
        </div>
        <form name="frmModProd" method="post" action="modificar.php">
            <input type="hidden" name="id" value="<?=$persona->id?>">
            <table class="table">
    <tr>
        <td>
            <label class="control-label">Nombre</label>  
        </td>
        <td>
            <span><?=$persona->nombre?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Apellido paterno</label>
        </td>
        <td>
            <span><?=$persona->a_paterno?></span>
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Apellido materno</label>
        </td>
        <td>
            <span><?=$persona->a_materno?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Fecha de nacimiento</label>
        </td>
        <td>
            <span><?=$persona->fecha_nac?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Correo electronico</label>
        </td>
        <td>
            <span><?=$persona->correo?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Numero de telefono</label>
        </td>
        <td>
            <span><?=$persona->telefono?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Username</label>  
        </td>
        <td>
            <span><?=$persona->username?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Password</label>  
        </td>
        <td>
            <span><?=$persona->password?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Rol</label>  
        </td>
        <td>
            <span><?=$persona->rol?></span>
        </td>        
    </tr>

    <tr>
        <td colspan="2">
            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="cerrarVentana()"><img src="../images/save.svg">&nbsp;Cerrar</button>
            </div>
        </td>
    </tr>

</table>
</form>
</div>
</body>
</html>