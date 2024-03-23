<?php require_once('../../logica/Reserva.php');?>
<?php require_once('../../logica/Persona.php');?>
<?php require_once('../../logica/Evento.php');?>
<?php require_once('../../logica/Salon.php');?>

<?php 

$reserva = new Reserva();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $reserva->id = $_GET['id'];
    $reserva->recuperaRegistro($reserva->id);

    $evento = new Evento();
    $evento->recuperaRegistro($reserva->id_evento);

    $persona = new Persona();
    $persona->id = $evento->id_persona;
    $persona->recuperaRegistro($persona->id);

    $salon = new Salon();
    $salon->id = $evento->id_salon;
    $salon->recuperaRegistro($salon->id);
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
        <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Reservas</a>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
    <input type="hidden" name="id" value="<?=$reserva->id?>">
  	<table class="table">

        <tr>
            <td>
                <label class="control-label">Nombre del evento</label>  
            </td>
            <td>
                <span><?=$evento->nombre?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Tipo de evento</label>
            </td>
            <td>
                <span><?=$evento->tipo?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">Numero de personas que asistiran</label>
            </td>
            <td>
                <span><?=$evento->asistentes?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Acceso</label>
            </td>
            <td>
                <span><?=$evento->acceso?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Comentarios</label>
            </td>
            <td>
                <span><?=$evento->comentarios?></span>
            </td>        
        </tr>

        <tr>
            <td>
                <label class="control-label">Fecha de inicio</label>
            </td>
            <td>
                <span><?=$evento->fecha_inicio?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Fecha de finalizacion</label>
            </td>
            <td>
                <span><?=$evento->fecha_fin?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Hora de inicio</label>
            </td>
            <td>
                <span><?=$evento->hora_inicio?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Fecha de finalizacion</label>
            </td>
            <td>
                <span><?=$evento->hora_fin?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Estatus</label>
            </td>
            <td>
                <span><?=$evento->estatus?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Nombre del salon</label>  
            </td>
            <td>
                <span><?=$salon->nombre?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Capacidad</label>  
            </td>
            <td>
                <span><?=$salon->capacidad?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Precio</label>  
            </td>
            <td>
                <span><?=$salon->precio?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Tamaño</label>  
            </td>
            <td>
                <span><?=$salon->tamano?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Pais</label>  
            </td>
            <td>
                <span><?=$salon->pais?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Estado</label>  
            </td>
            <td>
                <span><?=$salon->estado?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Ciudad</label>  
            </td>
            <td>
                <span><?=$salon->ciudad?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Direccion</label>  
            </td>
            <td>
                <span><?=$salon->direccion?></span>
            </td>        
        </tr>
        <tr>
            <td>
                <label class="control-label">Estatus</label>  
            </td>
            <td>
                <span><?=$salon->estatus?></span>
            </td>        
        </tr>
    </table>
    </form>
</div>
</body>
</html>