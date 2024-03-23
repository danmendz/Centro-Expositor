<?php require_once('../../logica/ReservaCajon.php');?>
<?php
$reserva = new ReservaCajon();

if (isset($_GET['id']) && isset($_GET['id'])) {
    $id_reserva = $_GET['id'];
    $informacion = $reserva->infoReserva($id_reserva);
}
?>
<html>
<head>
    <title>Visualizar reserva</title>
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
        <a href="<?php echo ($informacion->estatus == 0) ? 'pendientes.php' : 'reservados.php'; ?>" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de reservas</a>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$informacion->id?>">
  	<table class="table">
        <tr>
            <td>
                <label class="control-label">Área</label>  
            </td>
            <td>
                <span><?=$informacion->area_nombre?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Numero de cajón</label>  
            </td>
            <td>
                <span><?=$informacion->numero?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Fecha de reserva</label>  
            </td>
            <td>
                <span><?=$informacion->fecha?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Inicio de reserva</label>
            </td>
            <td>
                <span><?=$informacion->inicio?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">Fin de reserva</label>
            </td>
            <td>
                <span><?=$informacion->fin?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Fin de reserva</label>
            </td>
            <td>
                <span><?=$informacion->fin?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label" style="font-family: monospace; ">Información del reservante: </label>
            </td>
            <td>
                <span></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Nombre</label>
            </td>
            <td>
                <span><?=$informacion->persona_nombre?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Apellidos</label>
            </td>
            <td>
                <span><?=$informacion->a_paterno?> <?=$informacion->a_materno?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Télefono</label>
            </td>
            <td>
                <span><?=$informacion->telefono?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label" style="font-family: monospace; ">Información del evento: </label>
            </td>
            <td>
                <span></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Nombre de evento</label>
            </td>
            <td>
                <span><?=$informacion->evento_nombre?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Nombre de salón</label>
            </td>
            <td>
                <span><?=$informacion->salon_nombre?></span>
            </td>        
        </tr>

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