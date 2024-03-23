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
}
?>