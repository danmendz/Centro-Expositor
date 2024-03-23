<?php require_once('Modelo.php');?>
<?php
class Cajon extends Modelo {
	public $id;
	public $numero;
	public $estatus;
	public $id_area;

	function __construct() {
		parent::__construct();
		$this->tabla = "cajon";
	}

	function mostrar() {
		$this->consulta = "SELECT * from $this->tabla";

		return $this->encuentraTodos();
	}

	function listar($idArea) {
		$this->consulta = "SELECT * from $this->tabla where id_area = $idArea";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->id = $dato->id;
			$this->numero = $dato->numero;
			$this->estatus = $dato->estatus;
			$this->id_area = $dato->id_area;
		}
	}

	function insertaRegistro($datos) {
		
		$this->numero = $datos->numero;
		$this->estatus = $datos->estatus;
		$this->id_area = $datos->id_area;

		$this->consulta =
		"insert into $this->tabla (numero, estatus, id_area)".
		"values (".
		"'$this->numero',".
		"'$this->estatus',".
	    "'$this->id_area');";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro($datos) {
		$this->id = $datos->id;
		$this->numero = $datos->numero;
		$this->estatus = $datos->estatus;
		$this->id_area = $datos->id_area;

		$this->consulta =
		"UPDATE $this->tabla set ".
		"numero = '$this->numero',".
		"estatus = '$this->estatus',".
		"id_area = '$this->id_area'".
		"where id = $this->id";

		$this->ejecutaComandoIUD();
	}
  
  	function actualizaRegistroO() {
		$this->id = $_POST['id'];
		$this->numero = $_POST['numero'];
		$this->estatus = $_POST['estatus'];
		$this->id_area = $_POST['id_area'];

		$this->consulta =
		"UPDATE $this->tabla set ".
		"numero = '$this->numero',".
		"estatus = '$this->estatus',".
		"id_area = '$this->id_area'".
		"where id = $this->id";

		$this->ejecutaComandoIUD();
	}

	function eliminaRegistro($id){
		$this->consulta =
		"delete from $this->tabla ".
		"where id = $id;";

		$this->ejecutaComandoIUD();
	}
}
?>