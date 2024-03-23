<?php
require_once('../logica/Persona.php');
$persona = new Persona();

if (isset($_POST['username'])) {
	$username = $_POST['username'];
    $comprobar = $persona->comprobarUsername($username);

    if ($comprobar == true) {
			header('Location:'.'login.php?error=username');
    } else {
    	$registro = $persona->registrar();

    	if ($registro == true) {
    		header('Location: exito.html');
    	} else {
    		header('Location: error.html');
    	}
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="login.css">

	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<body>
<?php
	if (isset($_REQUEST['error'])) {
    $error = $_REQUEST['error'];

    switch ($error) {
      case 'credenciales':
        echo '
          <script>
          alertify.alert("Error", "El usuario o contraseña son incorrectos!");
          </script>
        ';
        break;
      case 'db':
        echo '
          <script>
          alertify.alert("Error", "Por favor vuelva a intentarlo!");
          </script>
        ';
        break;
      case 'username':
        echo '
          <script>
          alertify.alert("Error", "El nombre de usuario ya existe!");
          </script>
        ';
        break;
      case 'nosesion':
        echo '
          <script>
          alertify.alert("Error", "Por favor inicia sesión para continuar.");
          </script>
        ';
        break;
      default:
        break;
    }
}
?>

<a href="../index.php" style="text-decoration: none; color: black;"><button type="button" style="bottom: 5%;
  left: 5%; 
  position: fixed; 
  background: #010101; 
  color: white; 
  border-radius: 10px;
  padding: 5px 15px;
  font-size: 13px;
  
  ">Cancelar</button></a>

<div class="form-structor">

	<div class="signup">
		<h2 class="form-title" id="signup"><span>o</span>Iniciar sesión</h2>

		<div class="form-holder">
			<form method="post" action="autenticar.php">
				<input class="input" type="text" name="username" placeholder="Usuario" required />
				<input class="input" type="password" name="password" placeholder="Contraseña" required />
				<input hidden />
				<button type="submit" role="button" class="submit-btn">Iniciar</button>
			</form>
		</div>
	</div>

	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>o</span>Registrarse</h2>

			<div class="form-holder">
			<form method="post" action="login.php">

				<input class="input" type="text" name="nombre" required class="form-control" placeholder="Nombre">
				<input class="input" type="text" name="a_paterno" required class="form-control" placeholder="Apellido Paterno">
				<input class="input" type="text" name="a_materno" required class="form-control" placeholder="Apellido Materno">
				<input title="Fecha de nacimiento" class="input" type="date" name="fecha_nac" required class="form-control">
				<input class="input" type="email" name="correo" required class="form-control" placeholder="Correo">
				<input class="input" type="tel" name="telefono" class="form-control" placeholder="Telefono">
				<input class="input" type="text" name="username" required class="form-control" placeholder="Usuario">
				<input class="input" type="password" name="password" required class="form-control" placeholder="Contraseña" pattern=".{8,}" title="La contraseña debe tener al menos 8 caracteres">
				<button type="submit" role="button" class="submit-btn">Registrar</button>

			</form>
			</div>

		</div>
	</div>

</div>

<script type="text/javascript">
	console.clear();

	const loginBtn = document.getElementById('login');
	const signupBtn = document.getElementById('signup');

	loginBtn.addEventListener('click', (e) => {
		let parent = e.target.parentNode.parentNode;
		Array.from(e.target.parentNode.parentNode.classList).find((element) => {
			if(element !== "slide-up") {
				parent.classList.add('slide-up')
			}else{
				signupBtn.parentNode.classList.add('slide-up')
				parent.classList.remove('slide-up')
			}
		});
	});

	signupBtn.addEventListener('click', (e) => {
		let parent = e.target.parentNode;
		Array.from(e.target.parentNode.classList).find((element) => {
			if(element !== "slide-up") {
				parent.classList.add('slide-up')
			}else{
				loginBtn.parentNode.parentNode.classList.add('slide-up')
				parent.classList.remove('slide-up')
			}
		});
	});
</script>

</body>
</html>