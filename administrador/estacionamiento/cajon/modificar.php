<?php require_once('../../logica/Cajon.php'); ?>
<?php 

$cajon = new Cajon();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $cajon->actualizaRegistroO();

} elseif (isset($_GET['id'])) {
    $cajon->id = $_GET['id'];
    $cajon->recuperaRegistro($cajon->id);
}
?>
<html>
<head>
    <title>Modificar cajón</title>
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
            <!-- <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de cajones</a> -->
        </div>
        <form name="frmModProd" method="post" action="modificar.php">
            <input type="hidden" name="id" value="<?=$cajon->id?>">
            <table class="table">
                <tr>
                <td>
                    <label class="control-label">Numero de cajon</label>
                   <input type="text" name="numero" value="<?=$cajon->numero?>" class="form-control">
               </td>
           </tr>

           <tr>
        <td>
            <label class="control-label">Estatus</label>
            <input type="number" name="estatus" value="<?=$cajon->estatus?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Area</label>
            <input type="number" name="id_area" value="<?=$cajon->id_area?>" class="form-control">
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