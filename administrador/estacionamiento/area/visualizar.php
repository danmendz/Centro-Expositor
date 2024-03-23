<?php require_once('../../logica/Area.php'); ?>
<?php 

$area = new Area();
if (isset($_GET['id_area']) && !empty($_GET['id_area'])) {
    $area->id = $_GET['id_area'];
    $dato = $area->recuperaInfo($area->id);
}
?>
<html>
<head>
    <title>Visualizar área</title>
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
        <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de áreas</a>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$dato->id?>">
  	<table class="table">
    <tr>
        <td>
            <label class="control-label">ID área</label>  
        </td>
        <td>
            <span><?=$dato->id?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label">Nombre del área</label>  
        </td>
        <td>
            <span><?=$dato->nombre?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Capacidad</label>  
        </td>
        <td>
            <span><?=$dato->capacidad?></span>
        </td>        
    </tr>

    <?php if (!empty($dato->id_evento)): ?>
    <tr>
        <td style="font-size: 20px; font-family: monospace;">Información sobre el evento asignado</td>
        <td></td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Nombre de evento:</label>  
        </td>
        <td>
            <span><?=$dato->evento_nombre?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Fecha de inicio:</label>  
        </td>
        <td>
            <span><?=$dato->fecha_inicio?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Hora de inicio:</label>  
        </td>
        <td>
            <span><?=$dato->hora_inicio?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Numero de invitados:</label>  
        </td>
        <td>
            <span><?=$dato->asistentes?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Nombre de salon:</label>  
        </td>
        <td>
            <span><?=$dato->salon_nombre?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Nombre de persona:</label>  
        </td>
        <td>
            <span><?=$dato->persona_nombre?></span>
        </td>        
    </tr>
    <tr>
        <td>
            <label class="control-label">Apellidos:</label>  
        </td>
        <td>
            <span><?=$dato->a_paterno?> <?=$dato->a_materno?></span>
        </td>        
    </tr>
    <?php endif; ?>

    <tr>
        <td colspan="2">
			<div class="form-group">
    			<button type="button" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Cerrar</button>
			</div>
        </td>
    </tr>
  </table>
    </form>
</div>
</body>
</html>