<?php require_once('../logica/Evento.php');?>
<?php 

$evento = new Evento();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $evento->actualizaRegistro();
} elseif (isset($_GET['id'])) {
    $evento->id = $_GET['id'];
    $evento->recuperaRegistro($evento->id);
}
?>
<html>
<head>
    <title>Modificar evento</title>
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
        <form name="frmModProd" method="post" action="modificar.php">
            <input type="hidden" name="id" value="<?=$evento->id?>">
            <table class="table">
                <tr>
                    <td>
                        <label class="control-label">Nombre del evento</label>
                        <input type="text" name="nombre" value="<?=$evento->nombre?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="tipo">Tipo de evento:</label>
                        <select id="tipo" name="tipo">
                            <option value="social" <?php if ($evento->tipo == 'social') echo 'selected'; ?>>Social</option>
                            <option value="deportivo" <?php if ($evento->tipo == 'deportivo') echo 'selected'; ?>>Deportivo</option>
                            <option value="cultural" <?php if ($evento->tipo == 'cultural') echo 'selected'; ?>>Cultural</option>
                            <option value="convencion" <?php if ($evento->tipo == 'convencion') echo 'selected'; ?>>Convención</option>
                            <option value="academico" <?php if ($evento->tipo == 'academico') echo 'selected'; ?>>Académico</option>
                            <option value="religioso" <?php if ($evento->tipo == 'religioso') echo 'selected'; ?>>Religioso</option>
                            <option value="politico" <?php if ($evento->tipo == 'politico') echo 'selected'; ?>>Político</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>
                        <label class="control-label">Numero de personas que asistiran</label>
                        <input type="number" name="asistentes" value="<?=$evento->asistentes?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="acceso">Tipo de acceso:</label>
                        <select id="acceso" name="acceso">
                            <option value="publico" <?php if ($evento->acceso == 'publico') echo 'selected'; ?>>Público</option>
                            <option value="privado" <?php if ($evento->acceso == 'privado') echo 'selected'; ?>>Privado</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">Comentarios</label>
                        <input type="text" name="comentarios" value="<?=$evento->comentarios?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">Fecha de inicio</label>
                        <input type="date" name="fecha_inicio" value="<?=$evento->fecha_inicio?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">Fecha de finalizacion</label>
                        <input type="date" name="fecha_fin" value="<?=$evento->fecha_fin?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">Hora de inicio</label>
                        <input type="date" name="hora_inicio" value="<?=$evento->fecha_inicio?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">Hora de finalizacion</label>
                        <input type="date" name="hora_fin" value="<?=$evento->fecha_fin?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="estatus">Estatus</label>
                        <select id="estatus" name="estatus">
                            <option value="finalizado" <?php if ($evento->estatus == 'finalizado') echo 'selected'; ?>>En proceso</option>
                            <option value="cancelado" <?php if ($evento->estatus == 'cancelado') echo 'selected'; ?>>Reservado</option>
                            <option value="iniciado" <?php if ($evento->estatus == 'iniciado') echo 'selected'; ?>>Realizado</option>
                            <option value="reservado" <?php if ($evento->estatus == 'reservado') echo 'selected'; ?>>Cancelado</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">ID de cliente</label>
                        <input type="number" name="id_persona" value="<?=$evento->id_persona?>" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="control-label">Numero de salon</label>
                        <input type="number" name="id_salon" value="<?=$evento->id_salon?>" class="form-control">
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