<?php require_once('Modelo.php');?>
<?php
class Persona extends Modelo {
	public $id;
	public $nombre;
	public $a_paterno;
	public $a_materno;
	public $fecha_nac;
	public $correo;
	public $telefono;
	public $username;
	public $password;
	public $rol;

	function __construct() {
		parent::__construct();
		$this->tabla = "persona";
	} 
  
  	function recuperaUsuario($user, $pass) {
		$this->consulta = "select * from $this->tabla where username = '$user' and password = '$pass' ";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->id = $dato->id;
	 		$this->nombre = $dato->nombre;
			$this->a_paterno = $dato->a_paterno;
			$this->a_materno = $dato->a_materno;
			$this->fecha_nac = $dato->fecha_nac;
			$this->correo = $dato->correo;
			$this->telefono = $dato->telefono;
			$this->username = $dato->username;
			$this->password = $dato->password;
			$this->rol = $dato->rol;
	 	}
	 	return $dato;
	}
  
  	function recuperaUsuarioO($username){
		$this->consulta = "select * from $this->tabla where username = '$username'";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->id = $dato->id;
	 		$this->username = $dato->username;
			$this->password = $dato->password;
			$this->rol = $dato->rol;
	 	}
	 	return (isset($dato));
	}

	function obtenerEventosUsuario($id) {
        $this->consulta = "
		SELECT
		e.id,
		e.nombre,
		e.tipo,
		e.asistentes,
		e.acceso,
		e.comentarios,
		e.fecha_inicio,
		e.fecha_fin,
		e.hora_inicio,
		e.hora_fin,
		e.estatus,
		e.id_persona,
		e.id_salon,
		s.nombre AS salon_nombre

		FROM evento e 
		JOIN salon s ON s.id = e.id_salon
		WHERE e.id_persona = '$id' AND e.estatus = 'aprobado' ";

		return $this->encuentraTodos();
    }

    function obtenerAreaEvento($idEvento) {
    	$this->consulta = "SELECT * FROM area WHERE id_evento = '$idEvento' ";
    	return $this->encuentraUno();
    }

    function obtenerCajonArea($idArea) {
    	$this->consulta = "SELECT * FROM cajon WHERE id_area = '$idArea' ";
    	return $this->encuentraTodos();
    }

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();	

		if ( isset($dato) ) {
			$this->nombre = $dato->nombre;
			$this->a_paterno = $dato->a_paterno;
			$this->a_materno = $dato->a_materno;
			$this->fecha_nac = $dato->fecha_nac;
			$this->correo = $dato->correo;
			$this->telefono = $dato->telefono;
			$this->username = $dato->username;
			$this->password = $dato->password;
			$this->rol = $dato->rol;
		}
	}

	function insertaRegistro() {

		$this->nombre = $_POST['nombre'];
        $this->a_paterno = $_POST['a_paterno'];
        $this->a_materno = $_POST['a_materno'];
        $this->fecha_nac = $_POST['fecha_nac'];
        $this->correo = $_POST['correo'];
        $this->telefono = $_POST['telefono'];
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];

		$this->consulta = 
		"insert into $this->tabla (nombre, a_paterno, a_materno, fecha_nac, correo, telefono, username, password) ".
		"values ( " .
		"'$this->nombre',".
		"'$this->a_paterno',".
		"'$this->a_materno',".
		"'$this->fecha_nac',".
		"'$this->correo',".
		"'$this->telefono')',".
		"'$this->username', ".
		"'$this->password');";

		$this->ejecutaComandoIUD();
	}

	function comprobarUsername($username) {
	    $this->consulta =
	    "SELECT * from $this->tabla WHERE username = '$username' ";
	    $resultado = $this->ejecutaComandoIUD();
	    
	    if ($resultado->rowCount() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function registrar() {
	    $this->nombre = $_POST['nombre'];
	    $this->a_paterno = $_POST['a_paterno'];
	    $this->a_materno = $_POST['a_materno'];
	    $this->fecha_nac = $_POST['fecha_nac'];
	    $this->correo = $_POST['correo'];
	    $this->telefono = $_POST['telefono'];
	    $this->username = $_POST['username'];
	    $getPassword = trim($_POST['password']);
	    $this->password = md5($getPassword);

	    $this->consulta =
	    "INSERT INTO $this->tabla (nombre, a_paterno, a_materno, fecha_nac, correo, telefono, username, password) " .
	    "VALUES (" .
	    "'$this->nombre', " .
	    "'$this->a_paterno', " .
	    "'$this->a_materno', " .
	    "'$this->fecha_nac', " .
	    "'$this->correo', " .
	    "'$this->telefono', " .
	    "'$this->username', " .
	    "'$this->password');";

	    $result = $this->ejecutaComandoIUD();
	    return $result !== false; 
	}

	function actualizaRegistro() {
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->a_paterno = $_POST['a_paterno'];
		$this->a_materno = $_POST['a_materno'];
		$this->fecha_nac = $_POST['fecha_nac'];
		$this->correo = $_POST['correo'];
		$this->telefono = $_POST['telefono'];
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];
		$this->rol = $_POST['rol'];	

		$this->consulta = 
		"UPDATE $this->tabla set " .
		"nombre = '$this->nombre', ".
		"a_paterno = '$this->a_paterno', ".
		"a_materno = '$this->a_materno', ".
		"fecha_nac = '$this->fecha_nac', ".
		"correo = '$this->correo', ".
		"telefono = '$this->telefono', ".
		"username = '$this->username',".
		"password = '$this->password',".
		"rol = '$this->rol' ".
		"where id = $this->id";

		$this->ejecutaComandoIUD();
	}

	function eliminaRegistro($id) {
		$this->consulta = 
		"delete from $this->tabla ".
		"where id = $id;";

		$this->ejecutaComandoIUD();
	}
}
?>