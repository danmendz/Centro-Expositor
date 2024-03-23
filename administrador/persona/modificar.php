<?php require_once('../logica/Persona.php');?>
<?php 

$persona = new Persona();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $persona->actualizaRegistro();
} elseif (isset($_GET['id'])) {
    $persona->id = $_GET['id'];
    $persona->recuperaRegistro($persona->id);
}
?>
<html>
<head>
    <title>Modificar persona</title>
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
        <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de personas</a>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$persona->id?>">
  	<table class="table">
    <tr>
        <td>
        	<label class="control-label">Nombre</label>  
        	<input type="text" name="nombre" value="<?=$persona->nombre?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label">Apellido paterno</label>
        	<input type="text" name="a_paterno" value="<?=$persona->a_paterno?>" class="form-control">
       	</td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Apellido materno</label>
            <input type="text" name="a_materno" value="<?=$persona->a_materno?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nac" value="<?=$persona->fecha_nac?>" class="form-control">
        </td>
    </tr>
     <tr>
        <td>
            <label class="control-label">Correo electronico</label>
            <input type="email" name="correo" value="<?=$persona->correo?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
            <label class="control-label">Numero de telefono</label>
            <input type="tel" name="telefono" value="<?=$persona->telefono?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
            <label class="control-label">Username</label>  
            <input type="text" name="username" value="<?=$persona->username?>" class="form-control">
        </td>
    </tr>
     <tr>
        <td>
            <label class="control-label">Password</label>
            <input type="password" name="password" value="<?=$persona->password?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
            <label for="rol">Rol:</label>
            <select id="rol" name="rol">
                <option value="usuario" <?php if ($persona->rol == 'usuario') echo 'selected'; ?>>Usuario</option>
                <option value="cliente" <?php if ($persona->rol == 'cliente') echo 'selected'; ?>>Cliente</option>
                <option value="trabajador" <?php if ($persona->rol == 'trabajador') echo 'selected'; ?>>Trabajador</option>
                <option value="admin" <?php if ($persona->rol == 'admin') echo 'selected'; ?>>Administrador</option>
            </select>
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