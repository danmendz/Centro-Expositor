<?php
class Modelo {
	protected $host ="db5014807879.hosting-data.io";
	protected $usuario = "dbu2703780";
	protected $contraseña = "eventosintegradora01";
	protected $database = "dbs12303228";
	public $mbd;
	protected $tabla;
	protected $consulta;

	function __construct() {
		try {
    		$this->mbd = new PDO("mysql:host=$this->host;dbname=$this->database", $this->usuario, $this->contraseña);
		} catch (PDOException $e) {
		    print "Error: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	function __destruct() {
	    $this->mbd = null;
	}

	function encuentraTodos() {
		try {

		    $stm = $this->mbd->query($this->consulta);

		    $filas = $stm->fetchAll(PDO::FETCH_OBJ);

		} catch (PDOException $e) {
		    print "Error: " . $e->getMessage() . "<br/>";
		    die();
		}
	    return $filas;
	}

	function encuentraUno() {
		try {

		    $stm = $this->mbd->query($this->consulta);

		    $fila = $stm->fetch(PDO::FETCH_OBJ);

		} catch (PDOException $e) {
		    print "Error: " . $e->getMessage() . "<br/>";
		    die();
		}
	    return $fila;
	}

	function ejecutaComandoIUD() {
		try {

		    $result = $this->mbd->query($this->consulta);

		} catch (PDOException $e) {
		    print "Error: " . $e->getMessage() . "<br/>";
		    die();
		}
	    return $result;
	}
}
?>