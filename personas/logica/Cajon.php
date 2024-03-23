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

	function listar($idArea) {
		$this->consulta = "SELECT * from $this->tabla where id_area = $idArea";

		return $this->encuentraTodos();
	}

	function infoCajon($idCajon) {
	    $this->consulta = "
	    SELECT
	    r.id AS reserva_id,
	    r.fecha,
	    r.inicio,
	    r.fin,
	    c.*,
	    a.id AS area_id,
	    a.nombre AS area_nombre

	    FROM reservacionCajon r
		    JOIN cajon c ON r.id_cajon = c.id
		    JOIN area a ON c.id_area = a.id
	    WHERE c.id = $idCajon";

	    return $this->encuentraUno();
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

	function insertaRegistro() {
		$this->id = $_POST['id'];
		$this->numero = $_POST['numero'];
		$this->estatus = $_POST['estatus'];
		$this->id_area = $_POST['id_area'];

		$this->consulta =
		"insert into $this->tabla (numero, estatus, id_area)".
		"values (".
		"'$this->numero',".
		"'$this->estatus',".
	    "'$this->id_area');";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro() {
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