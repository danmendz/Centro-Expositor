<?php require_once('../../logica/Evento.php');?>
<?php require_once('../../logica/Modelo.php');?>
<?php
session_start();
$id_usuario = $_SESSION["id"];

$evento = new Evento();
$modelo = new Modelo();

if (isset($_POST['id'])) {
    $evento->insertaRegistro();
}

try {
    $stmt = $modelo->mbd->prepare("SELECT * FROM salon WHERE estatus = 'disponible' ");
    $stmt->execute();
    $salones_disponibles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los datos: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insertar evento</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

    form div {
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
<div class="container py-2">

    <form name="frmInsProd" method="post" action="insertar.php">
        <h1>Reserva tu evento!</h1>
        <span><br></span>
        <input type="hidden" name="id" value="0">
        <input type="hidden" name="id_persona" value="<?=$id_usuario?>">

        <div class="form-floating mb-3">
          <input type="text" name="nombre" class="form-control" id="floatingInput" required placeholder="Nombre del evento">
          <label for="floatingInput">Nombre del evento</label>
        </div>

        <div class="form-floating">
          <select class="form-select" name="tipo" id="floatingSelect" aria-label="Floating label select example" required>
            <option value="social">Social</option>
            <option value="deportivo">Deportivo</option>
            <option value="cultural">Cultural</option>
            <option value="convencion">Convención</option>
            <option value="academico">Académico</option>
            <option value="religioso">Religioso</option>
            <option value="politico">Político</option>
          </select>
          <label for="floatingSelect">Tipo de evento</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" name="asistentes" class="form-control" id="floatingInput" required>
          <label for="floatingInput">Numero de asistentes</label>
        </div>

        <div class="form-floating">
          <select class="form-select" name="acceso" id="floatingSelect" aria-label="Floating label select example" required>
            <option value="publico">Público</option>
            <option value="privado">Privado</option>
          </select>
          <label for="floatingSelect">Tipo de acceso</label>
        </div>

        <label class="control-label">Duracion del evento:</label>
        <div class="row g-2">
          <div class="col-md">
            <div class="form-floating">
              <input type="date" name="fecha_inicio" class="form-control" id="floatingInputGrid" required>
              <label for="floatingInputGrid">Fecha de inicio</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="date" name="fecha_fin" class="form-control" id="floatingInputGrid" required>
              <label for="floatingInputGrid">Fecha de finalizacion</label>
            </div>
          </div>
        </div>

        <div class="row g-2">
          <div class="col-md">
            <div class="form-floating">
              <input type="time" name="hora_inicio" class="form-control" id="floatingInputGrid" required>
              <label for="floatingInputGrid">Hora de inicio</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="time" name="hora_fin" class="form-control" id="floatingInputGrid" required>
              <label for="floatingInputGrid">Hora de finalizacion</label>
            </div>
          </div>
        </div>

        <label for="salon">Salon:</label>
        <select id="salon" name="id_salon" class="form-control" required>
            <?php foreach ($salones_disponibles as $salon) : ?>
                <option value="<?php echo $salon['id']; ?>">
                    <?php echo $salon['nombre'] . ' (Capacidad: ' . $salon['capacidad'] . ' personas)'; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <div class="form-floating mb-3">
          <input type="text" name="comentarios" class="form-control" id="floatingInput" required>
          <label for="floatingInput">Comentarios</label>
        </div>

        <div class="button-container">
          <button type="submit" role="button">Reservar</button>
        </div>
    </form>

</div>
</body>
</html>