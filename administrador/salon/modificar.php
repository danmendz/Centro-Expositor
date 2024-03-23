<?php require_once('../logica/Salon.php');?>
<?php 

$salon = new Salon();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $salon->actualizaRegistro();
} elseif (isset($_GET['id'])) {
    $salon->id = $_GET['id'];
    $salon->recuperaRegistro($salon->id);
}
?>
<html>
<head>
    <title>Modificar salon</title>
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
            <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de salones</a>
        </div>
        <form name="frmModProd" method="post" action="modificar.php">
            <input type="hidden" name="id" value="<?=$salon->id?>">
            <table class="table">
                <tr>
                <td>
                    <label class="control-label">Nombre del salon</label>
                   <input type="text" name="nombre" value="<?=$salon->nombre?>" class="form-control">
               </td>
           </tr>

           <tr>
        <td>
            <label class="control-label">Capacidad</label>
            <input type="number" name="capacidad" value="<?=$salon->capacidad?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Precio</label>
            <input type="number" name="precio" value="<?=$salon->precio?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Tamaño</label>
            <input type="number" name="tamano" value="<?=$salon->tamano?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Pais</label>
            <input type="text" name="pais" value="<?=$salon->pais?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Estado</label>
            <input type="text" name="estado" value="<?=$salon->estado?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Ciudad</label>
            <input type="text" name="ciudad" value="<?=$salon->ciudad?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Direccion</label>
            <input type="text" name="direccion" value="<?=$salon->direccion?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label for="estatus">Estatus:</label>
            <select id="estatus" name="estatus">
                <option value="disponible" <?php if ($salon->estatus == 'disponible') echo 'selected'; ?>>Disponible</option>
                <option value="ocupado" <?php if ($salon->estatus == 'ocupado') echo 'selected'; ?>>Ocupado</option>
                <option value="remodelacion" <?php if ($salon->estatus == 'remodelacion') echo 'selected'; ?>>En remodelación</option>
            </select>
        </td>
    </tr>

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