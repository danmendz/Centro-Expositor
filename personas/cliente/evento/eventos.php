<?php include_once("../../logica/Evento.php") ?>
<?php include_once("../../logica/Invitados.php") ?>
<?php
session_start();
$id_persona = $_SESSION["id"];

$evento = new Evento();
$eventos = $evento->mostrar($id_persona);

$invitado = new Invitado();
if (isset($_POST['id_evento']) and isset($_POST['id_persona'])) {
    $invitado->insertarRegistro();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Eventos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style type="text/css">
    /*--------------------------------------------------------------
#  Targets
--------------------------------------------------------------*/

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');


h1 {
  font-size: 2rem;
  font-family: 'Montserrat';
  font-weight: normal;
  color: #444;
  text-align: center;
  margin: 1.5rem 0;
}

.wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    padding: 20px;
    display: flex;
    align-content: center;
    justify-content: center;
    gap: 24px;
    flex-wrap: wrap;
}

.card1 {
    position: relative;
    width: 325px;
    height: 450px;
    background: #000;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
}

.poster {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.poster::before {
    content: '';
    position: absolute;
    bottom: -45%;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    transition: .3s;
}

.card1:hover .poster::before {
    bottom: 0;
}

.poster img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .3s;
}

.card1:hover .poster img {
    transform: scale(1.1);
}

.details {
    position: absolute;
    bottom: -100%;
    left: 0;
    width: 100%;
    height: auto;
    padding: 1.5em 1.5em 2em;
    background: #000a;
    backdrop-filter: blur(16px) saturate(120%);
    transition: .3s;
    color: #fff;
    z-index: 2;
}

.card1:hover .details {
    bottom: 0;
}

.details h1,
.details h2 {
    font-weight: 700;
}

.details h1 {
    color: #fff;
    font-size: 1.7em;
    margin-bottom: 5px;
}

.details h2 {
    font-weight: 400;
    font-size: 1em;
    margin-bottom: 10px;
    opacity: .6;
}

.details .tags {
    display: flex;
    flex-direction: column;
    gap: 0.375em;
    margin-bottom: 0.875em;
    font-size: 0.85em;
}

.details .tags span {
    padding: 0.35rem 0.65rem;
    color: #fff;
    border: 1.5px solid rgba(255, 255, 255, 0.4);
    border-radius: 4px;
    border-radius: 50px;
}

.details .desc {
    color: #fff;
    opacity: .8;
    line-height: 1.5;
    margin-bottom: 1em;
}

.details button{
    display: flex;
    margin: 0 auto;
    border-radius: 20px;
    border: 1px solid #FFB424;
    background-color: #FFB424;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}
  </style>
</head>
<body>
  <section>
    <h1>Eventos disponibles</h1>

    <div class="wrapper">
      <?php
      if (!empty($eventos)) {
          foreach ($eventos as $evento):
        ?>
        <div class="card1">
          <div class="poster"><img src="../images/evento.jpg" alt="Evento"></div>
          <div class="details">
            <h1>Asiste a <?= $evento->evento_nombre ?></h1>
            <h2><?= $evento->comentarios ?></h2>

            <div class="tags">
              <span class="tag">Fecha: <?= $evento->fecha_inicio ?></span>
              <span class="tag">Hora: <?= $evento->hora_inicio ?></span>
              <span class="tag">Salón de reunión: <?= $evento->salon_nombre ?></span>
            </div>

            <p class="desc">
              Organizador: <?= $evento->persona_nombre ?> <?= $evento->a_paterno ?> <?= $evento->a_materno ?>
              <br>
              Contacto: <?= $evento->correo ?> 
            </p>

            <div class="form-container">
              <form action="eventos.php" method="post">
                <input type="hidden" name="id_evento" value="<?= $evento->evento_id ?>">
                <input type="hidden" name="id_persona" value="<?= $id_persona ?>">
                <!-- <?= $idUsuario ?> -->
                <button id="boton" type="submit">Participar</button>
              </form>
            </div>
          </div>
        </div>
      <?php 
        endforeach; 
    } else{ echo "No hay eventos";} ?>
    </div>

  </section>
</body>
</html>