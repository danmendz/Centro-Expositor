<?php require_once('logica/Evento.php');?>
<?php require_once('logica/Modelo.php');?>

<?php
$modelo = new Modelo();
$evento = new Evento();
$eventos_publicos = $evento->mostrarInformacion();

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <title>Centro Expositor</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <script src="javascript/menu.js"></script>
  <script src="javascript/maps.js"></script>
  <script src="javascript/clima.js"></script>
  <link href="css/styles.css" rel="stylesheet">
</head>

<body>
  
  <section id="inicio"></section>
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <div class="wrapper1">
            <div class="typing-demo">
              <h1>Centro Expositor.</h1>
            </div>
          </div>
          <h2>
            ¡Ven y disfruta de la magia de Puebla!
          </h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="images/logoCentro-bg.png" class="img-fluid animated" alt="">
        </div>
      </div>
      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bi bi-info-circle"></i>
            <h3><a href="#sobre">Sobre nosotros</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bi bi-telephone"></i>
            <h3><a href="#contacto">Contáctenos</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bi bi-houses"></i>
            <h3><a href="#salones">Salones</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bi bi-calendar4-week"></i>
            <h3><a href="#eventos">Cartelera</a></h3>
          </div>
        </div>
        <!-- <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="bi bi-journal-text"></i>
            <h3><a href="login/sesion.php">Reservar</a></h3>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <section>
    <div style="height: 50px; width: 100%;background-color: white;">
    </div>
  </section>

  <?php require_once("header.php") ?>

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title1">
        <h2></h2>
        <p>
          Somos un equipo de profesionales enfocados en el turismo de reuniones y espectáculos. Contamos con la mejor infraestructura y servicios para hacer de tu evento la mejor experiencia.
        </p>
      </div>
    </div>
  </section>

  
  <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/Centro-Expositor-P.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/centroe.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/Centro-Expositor.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </button>
    </div>
  </section>

  <section>
    <div style="height: 100px; width: 100%;background-color: white;">
    </div>
  </section>

  
  <section id="sobre">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Sobre</h2>
        <p>Nosotros</p>
      </div>
    </div>
  </section>
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="images/event.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
          <h3>Visión.</h3>
          <p>
            “Ser un Organismo modelo a nivel nacional, líder en la
            generación y atracción de eventos del segmento de turismo de
            reuniones, que genera cambios positivos en la comunidad
            mediante una cultura de responsabilidad social y desarrollo
            sustentable.”
          </p>
          <h3>Misión.</h3>
          <p>
            “Somos un equipo de profesionales enfocados en el turismo
            de reuniones y en la conservación, administración y
            comercialización de áreas verdes que contribuyen al desarrollo
            sustentable del Estado de Puebla, mejorando la calidad de
            vida de la Sociedad Poblana.”
          </p>
        </div>
      </div>

    </div>
  </section>

  <section>
    <div style="height: 50px; width: 100%;background-color: white;">
    </div>
  </section>

  
  <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="image col-lg-6" style='background-image: url("images/valores.jpg");' data-aos="fade-right"></div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
          <h3 style="font-weight: 700;
          font-size: 28px;">
          Valores.
          </h3>
          <div class="icon-box mt-5 mt-lg-0">
            <i class="bi bi-check"></i>
            <h4>Responsabilidad</h4>
            <p>
              Buscamos cumplir con los objetivos establecidos en tiempo y forma sin perder la calidad que nos distingue.
            </p>
          </div>
          <div class="icon-box mt-5">
            <i class="bi bi-check"></i>
            <h4>Transparencia</h4>
            <p>
              Buscamos ser claros sin ocultar información importante que perjudique la confianza de nuestros clientes.
            </p>
          </div>
          <div class="icon-box mt-5">
            <i class="bi bi-check"></i>
            <h4>Dedicación</h4>
            <p>
              Atención y esfuerzo para ofrecer la mejor calidad y experiencia al cliente.
            </p>
          </div>
          <div class="icon-box mt-5">
            <i class="bi bi-check"></i>
            <h4>Trabajo en equipo</h4>
            <p>
              Sumamos el esfuerzo del trabajo individual para poder aprovechar los talentos y habilidades de cada integrante de nuestra organización en la elaboración de una meta colectiva.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section>
    <div style="height: 100px; width: 100%;background-color: white;">
    </div>
  </section>

  
  <section  id="salones">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Salones</h2>
        <p>Nuestros salones</p>
      </div>
    </div>
  </section>

  <section>
  <div class="wrapper">

  <div class="card1">
    <div class="poster"><img src="images/salon1.jpg" alt="Location Unknown"></div>
    <div class="details">
      <h1>Salón Puebla 1</h1>
      <h2>Capacidad: 14,000 personas</h2>
      <div class="rating">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-half"></i>
        <span>4.5/5</span>
      </div>
      <div class="tags">
        <span class="tag">100 m</span>
        <span class="tag">100 m</span>
        <span class="tag">10,000 m2</span>
      </div>
      <p class="desc">
        Altura libre de 15 m.<br>
        El piso soporta 1 ton/m2.<br>
        Carga de 3o toneladas por trabe.<br>
        Lobby 1,280 m2.<br>
        Servicio de agua potable, drenaje, y aire acondicionado.
      </p>
    </div>
  </div>
  <div class="card1">
    <div class="poster"><img src="images/salon2.jpg" alt="Location Unknown"></div>
    <div class="details">
      <h1>Salón Puebla 2</h1>
      <h2>Capacidad: 20,000 personas</h2>
      <div class="rating">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star"></i>
        <span>4/5</span>
      </div>
      <div class="tags">
        <span class="tag">100 m</span>
        <span class="tag">250 m</span>
        <span class="tag">15,000 m2</span>
      </div>
      <p class="desc">
        Altura libre de 15 m.<br>
        El piso soporta 5 ton/m2.<br>
        Carga de 3o toneladas por trabe.<br>
        435 cajas de servicio de piso.<br>
        Servicio de agua potable, drenaje, y aire acondicionado.
      </p>
    </div>
  </div>

  <div class="card1">
    <div class="poster"><img src="images/salon3.jpg" alt="Location Unknown"></div>
    <div class="details">
      <h1>Salón Puebla 3</h1>
      <h2>Capacidad: 6,500 personas</h2>
      <div class="rating">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star"></i>
        <span>4/5</span>
      </div>
      <div class="tags">
        <span class="tag">100 m</span>
        <span class="tag">50 m</span>
        <span class="tag">5,000 m2</span>
      </div>
      <p class="desc">
        Altura libre de 15 m.<br>
        El piso soporta 5 ton/m2.<br>
        Carga de 3o toneladas por trabe.<br>
        Andenes de carga y descarga.<br>
        Servicio de agua potable, drenaje, y aire acondicionado.
      </p>
    </div>
  </div>

  <div class="card1">
    <div class="poster"><img src="images/salonfuertedeguadalupe.jpg" alt="Location Unknown"></div>
    <div class="details">
      <h1>Salón Fuerte de Guadalupe</h1>
      <h2>Capacidad: 2,500 personas</h2>
      <div class="rating">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-half"></i>
        <span>4.5/5</span>
      </div>
      <div class="tags">
        <span class="tag">55 m</span>
        <span class="tag">43 m</span>
        <span class="tag">2,365 m2</span>
      </div>
      <p class="desc">
        7 metros de altura.<br>
        Cocina equipada para 3,500 comensales.<br>
        Aire aoondicionado.<br>
        Piso alfombrado.<br>
        Área de registro.<br>
        Sanitarios hombres y mujeres.<br>
        Lobby 504 m2
      </p>
    </div>
  </div>

  <div class="card1">
    <div class="poster"><img src="images/salonanalco.jpg" alt="Location Unknown"></div>
    <div class="details">
      <h1>Salón Analco</h1>
      <h2>Capacidad: 1,500 personas</h2>
      <div class="rating">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star"></i>
        <span>4/5</span>
      </div>
      <div class="tags">
        <span class="tag">40.61 m</span>
        <span class="tag">31.05 m</span>
        <span class="tag">1,260.94 m2</span>
      </div>
      <p class="desc">
        Altura libre de 6.7 m.<br>
        Libre de columnas.<br>
        2 puertas de acceso.<br>
        3 accesos de servicio.<br>
        Iluminacion directa e indirecta.<br>
        26 registros eléctricos.<br>
        Instalaciones eléctricas ocultas.<br>
        Montacargas.<br>
        Soporte de 700 kg de carga estática por modulo de piso falso.
      </p>
    </div>
  </div>

  <div class="card1">
    <div class="poster"><img src="images/salonfuertedeloreto.jpg" alt="Location Unknown"></div>
    <div class="details">
      <h1>Salón Fuerte de Loreto</h1>
      <h2>Capacidad: 3,100 personas</h2>
      <div class="rating">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-half"></i>
        <span>4.5/5</span>
      </div>
      <div class="tags">
        <span class="tag">65 m</span>
        <span class="tag">43 m</span>
        <span class="tag">2,795 m2</span>
      </div>
      <p class="desc">
        7 metros de altura.<br>
        Cocina equipada para 3,500 comensales.<br>
        Aire aoondicionado.<br>
        Piso alfombrado.<br>
        Área de registro.<br>
        Sanitarios hombres y mujeres.<br>
        Lobby 420 m2
      </p>
    </div>
  </div>

</div>
</section>

  <section>
    <div style="height: 100px; width: 100%;background-color: white;">
    </div>
  </section>

  
    <section id="eventos" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Eventos</h2>
          <p>Cartelera</p>
        </div>

        <div class="row">

          <?php
            foreach ($eventos_publicos as $eventos) {
          ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img class="randomImage" src="" alt="Imagen aleatoria"></div>
              <h4><?=$eventos->evento_nombre;?></h4>
              <h5>Fecha: <?=$eventos->fecha_inicio;?></h5>
              <h5>Hora: <?=$eventos->hora_inicio;?></h5>
              <h5>Salon: <?=$eventos->salon_nombre;?></h5>
              <h5>Organizador: <?=$eventos->persona_nombre;?> <?=$eventos->a_paterno;?> <?=$eventos->a_materno;?></h5>
              <p><?=$eventos->comentarios;?></p>
            </div>
          </div>
          <?php
          }
          ?>

        </div>

      </div>
    </section>

    <script>
    var images = [
        "images/fiestas/balloons.jpg",
        "images/fiestas/concert.jpg",
        "images/fiestas/cuetes.jpg",
        "images/fiestas/party.jpg"
    ];

    function getRandomNumber(index, max) {
        var seed = index + 1;
        return (seed * 137 + 101) % max;
    }

    function showRandomImage() {
        var imgElements = document.querySelectorAll(".randomImage");

        imgElements.forEach(function(imgElement, index) {
            var randomIndex = getRandomNumber(index, images.length);
            var randomImageSrc = images[randomIndex];
            imgElement.src = randomImageSrc;
        });
    }

    showRandomImage();
  </script>

   <section>
    <div style="height: 100px; width: 100%;background-color: white;">
    </div>
   </section>

  
  <section id="contacto" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contacto</h2>
        <p>Contáctenos</p>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Dirección:</h4>
              <p>Boulevard Héroes del 5 de Mayo #402
              Paseo de San Francisco, Colonia Centro Histórico
              C.P. 72000, Puebla, Pue. México.</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>ventas@expo-puebla.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telefono:</h4>
              <p>+52 (222) 122 11 00 Ext. 1002</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <div id="map" style="height: 300px; width: 100%;"></div>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdBS00JY-BYj2OyaUkxH1pDjDGY_qGmCY&callback=initMap&v=weekly" defer>
          </script>
        </div>

      </div>

    </div>
  </section>

  <section>
    <div style="height: 100px; width: 100%;background-color: white;">
    </div>
  </section>

  <style type="text/css">
  .contenedor-inferior-derecha {
    position: fixed;
    bottom: 2vh;
    right: 2vh;
    background-color: #232427;
    color: #fff;
    padding: 2vh;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    width: 20vw;
    height: 18vh;
    max-width: 300px;
    min-width: 100px;
    font-size: 2vmin;
    opacity: 0.7;
    display: table-column;
  }
</style>

  <div class="contenedor-inferior-derecha" id="resultado">
  </div>
  
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>CEP<span>.</span></h3>
              <p>
                Zona de los Fuertes<br>
                Cívica 5 de Mayo<br>
                Puebla, México<br><br>
                <strong>CP:</strong> 72260 <br>
                <strong>Teléfono:</strong> +1 5589 55488 55<br>
                <strong>Correo:</strong> ventas@expo-puebla.com<br>
              </p>
              <div class="social-links mt-3">

                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="https://www.facebook.com/CentroExpositorPuebla?mibextid=ZbWKwL" role="button"><i class="bi bi-facebook"></i></a>

                <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="https://twitter.com/CExpositorPue?t=cUaKnJwq4ZT2KK_pj4qSpg&s=09" role="button" ><i class="bi bi-twitter"></i></a>

                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="https://instagram.com/cexpositorpue?igshid=NTc4MTIwNjQ2YQ==" role="button" ><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Enlaces útiles</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i><a href="#">Política de privacidad</a></li>
              <li><i class="bi bi-chevron-right"></i><a href="#">Protección de datos personales</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6">
              <img src="images/logoCentro-bg.png" class="rounded mx-auto d-block">
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Unete a nosotros.</h4>
            <p>
            Suscribete para poder reservar el evento de tus sueños.
            </p>
            <a href="login/login.php">
            <input type="button" value="Suscribir" style="background: #FFAA31; border-radius: 5px; color: black; ">
            </a>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span style="color: #FFC451;">RoyalByte</span></strong>. Todos los derechos reservados.
      </div>
    </div>

  </footer>

</body>
</html>