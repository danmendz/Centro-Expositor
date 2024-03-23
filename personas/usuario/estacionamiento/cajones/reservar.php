<?php require_once('../../../logica/ReservaCajon.php');?>
<?php
session_start();
$idPersona = $_SESSION["id"];

$reserva = new ReservaCajon();

try {
   if (isset($_POST['id_cajon']) && isset($_POST['id_persona'])) {
    $id_cajon = $_POST['id_cajon'];
    $id_persona = $_POST['id_persona'];

    if (isset($_POST['id'])) {
      $reserva->insertarRegistro();
    }
  }

} catch (Exception $e) {
  echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservar cajon</title>
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

  <form name="frmInsProd" method="post" action="reservar.php">
    <h1>Reservar cajon</h1>
    <span><br></span>
    <input type="hidden" name="id" value="0">
    <input type="hidden" name="id_persona" value="<?=$id_persona?>">
    <input type="hidden" name="id_cajon" value="<?=$id_cajon?>">

    <label class="control-label">Duración de la reserva:</label>
    <div class="row g-2">
      <div class="col-md">
        <div class="form-floating">
          <input type="date" name="fecha" class="form-control" id="floatingInputGrid" required>
          <label for="floatingInputGrid">Fecha de inicio</label>
        </div>
      </div>
    </div>

    <div class="row g-2">
      <div class="col-md">
        <div class="form-floating">
          <input type="time" name="inicio" class="form-control" id="floatingInputGrid" required>
          <label for="floatingInputGrid">Hora de inicio</label>
        </div>
      </div>

      <div class="col-md">
        <div class="form-floating">
          <input type="time" name="fin" class="form-control" id="floatingInputGrid" required>
          <label for="floatingInputGrid">Hora de finalizacion</label>
        </div>
      </div>
    </div>

    <div class="button-container">
      <button type="submit" role="button">Reservar</button>
    </div>
  </form>

</div>
</body>
</html>