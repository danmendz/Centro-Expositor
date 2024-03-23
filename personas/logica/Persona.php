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

	
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAPaterno()
    {
        return $this->a_paterno;
    }

    /**
     * @param mixed $a_paterno
     *
     * @return self
     */
    public function setAPaterno($a_paterno)
    {
        $this->a_paterno = $a_paterno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAMaterno()
    {
        return $this->a_materno;
    }

    /**
     * @param mixed $a_materno
     *
     * @return self
     */
    public function setAMaterno($a_materno)
    {
        $this->a_materno = $a_materno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaNac()
    {
        return $this->fecha_nac;
    }

    /**
     * @param mixed $fecha_nac
     *
     * @return self
     */
    public function setFechaNac($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     *
     * @return self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

	function __construct() {
		parent::__construct();
		$this->tabla = "persona";
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

		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
        $this->a_paterno = $_POST['a_paterno'];
        $this->a_materno = $_POST['a_materno'];
        $this->fecha_nac = $_POST['fecha_nac'];
        $this->correo = $_POST['correo'];
        $this->telefono = $_POST['telefono'];
		$this->username=$_POST['username'];
		$this->password=$_POST['password'];
		$this->rol=$_POST['rol'];
		
		$this->consulta = 
		"INSERT INTO $this->tabla (nombre, a_paterno, a_materno, fecha_nac, correo, telefono, username, password, rol) ".
		"values ( " .
		"'$this->nombre',".
		"'$this->a_paterno',".
		"'$this->a_materno',".
		"'$this->fecha_nac',".
		"'$this->correo',".
		"'$this->telefono',".
		"'$this->username', ".
		"'$this->password', ".
		"'$this->rol');";

		$this->ejecutaComandoIUD();
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