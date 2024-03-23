<?php require_once('Modelo.php');?>
<?php
class Salon extends Modelo {
 	public $id;
 	public $nombre;
 	public $capacidad;
 	public $precio;
 	public $tamano;
 	public $pais;
 	public $estado;
 	public $ciudad;
 	public $direccion;
 	public $estatus;

 	function __construct(){
 		parent::__construct();
 		$this->tabla = "salon";
 	}

 	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

    function actualizaEstatus($id_salon) {
        $this->consulta =
        "UPDATE $this->tabla ".
        "SET estatus = 'ocupado' ".
        "WHERE id = '$id_salon' ";
        $this->ejecutaComandoIUD();
    }

	function recuperaRegistro($id){
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->nombre = $dato->nombre;
			$this->capacidad = $dato->capacidad;
			$this->precio = $dato->precio;
			$this->tamano = $dato->tamano;
			$this->pais = $dato->pais;
			$this->estado = $dato->estado;
			$this->ciudad = $dato->ciudad;
			$this->direccion = $dato->direccion;
			$this->estatus = $dato->estatus;
		}
	}

	function insertaRegistro(){
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->capacidad = $_POST['capacidad'];
		$this->precio = $_POST['precio'];
		$this->tamano = $_POST['tamano'];
		$this->pais = $_POST['pais'];
		$this->estado = $_POST['estado'];
		$this->ciudad = $_POST['ciudad'];
		$this->direccion = $_POST['direccion'];
		$this->estatus = $_POST['estatus'];

		$this->consulta = 
		"insert into $this->tabla (nombre, capacidad, precio, tamano, pais, estado, ciudad, direccion, estatus) ".
		"values ( ".
		"'$this->nombre',".
		"'$this->capacidad',".
		"'$this->precio',".
		"'$this->tamano',".
		"'$this->pais',".
		"'$this->estado',".
		"'$this->ciudad',".
		"'$this->direccion',".
		"'$this->estatus')";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro() {
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->capacidad = $_POST['capacidad'];
		$this->precio = $_POST['precio'];
		$this->tamano = $_POST['tamano'];
		$this->pais = $_POST['pais'];
		$this->estado = $_POST['estado'];
		$this->ciudad = $_POST['ciudad'];
		$this->direccion = $_POST['direccion'];
		$this->estatus = $_POST['estatus'];

		$this->consulta =
		"UPDATE $this->tabla SET " .
        "nombre = '$this->nombre', " .
        "capacidad = '$this->capacidad', " .
        "precio = '$this->precio', " .
        "tamano = '$this->tamano', " .
        "pais = '$this->pais', " .
        "estado = '$this->estado', " .
        "ciudad = '$this->ciudad', " .
        "direccion = '$this->direccion', " .
        "estatus = '$this->estatus' " .
        "WHERE id = $this->id";

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