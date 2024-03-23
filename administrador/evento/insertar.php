<?php require_once('../logica/Evento.php');?>
<?php 

$evento = new Evento();

if (isset($_POST['id'])) {
    $evento->insertaRegistro();
}
?>
<html>
<head>
    <title>Insertar evento</title>
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
        <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de eventos</a>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php">
    <input type="hidden" name="id" value="0">
  	<table class="table">

    <tr>
        <td>
        	<label class="control-label">Nombre del evento</label>
        	<input type="text" name="nombre" value="" class="form-control">
       	</td>
    </tr>
    <tr>
        <td>
    <label for="tipo">Tipo de evento:</label>
        <select id="tipo" name="tipo">
            <option value="social">Social</option>
            <option value="deportivo">Deportivo</option>
            <option value="cultural">Cultural</option>
            <option value="convencion">Convención</option>
            <option value="academico">Académico</option>
            <option value="religioso">Religioso</option>
            <option value="politico">Político</option>
        </select>
    </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Numero de personas que asistiran</label>
            <input type="number" name="asistentes" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label for="acceso">Tipo de acceso:</label>
        <select id="acceso" name="acceso">
            <option value="publico">Público</option>
            <option value="privado">Privado</option>
        </select>
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Comentarios</label>
            <input type="text" name="comentarios" value="" class="form-control">
        </td>
    </tr>

    <tr>
        <td>
            <label class="control-label">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Fecha de finalizacion</label>
            <input type="date" name="fecha_fin" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Hora de inicio</label>
            <input type="time" name="hora_inicio" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Hora de finalizacion</label>
            <input type="time" name="hora_fin" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label for="estatus">Estatus</label>
            <select id="estatus" name="estatus">
                <option value="finalizado">En proceso</option>
                <option value="cancelado">Reservado</option>
                <option value="iniciado">Realizado</option>
                <option value="reservado">Cancelado</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">ID de cliente</label>
            <input type="number" name="id_persona" value="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label class="control-label">Numero de salon</label>
            <input type="number" name="id_salon" value="" class="form-control">
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