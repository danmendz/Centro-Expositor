<?php require_once('Modelo.php');?>
<?php 
class Evento extends Modelo {
	public $id;
	public $nombre;
	public $tipo;
	public $asistentes;
	public $acceso;
	public $comentarios;
	public $fecha_inicio;
	public $fecha_fin;
	public $hora_inicio;
	public $hora_fin;
	public $estatus;
	public $id_persona;
	public $id_salon;

  	function __construct() {
		parent::__construct();
		$this->tabla = "evento";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->nombre = $dato->nombre;
			$this->tipo = $dato->tipo;
			$this->asistentes = $dato->asistentes;
			$this->acceso = $dato->acceso;
			$this->comentarios = $dato->comentarios;
			$this->fecha_inicio = $dato->fecha_inicio;
			$this->fecha_fin = $dato->fecha_fin;
			$this->hora_inicio = $dato->hora_inicio;
			$this->hora_fin = $dato->hora_fin;
			$this->estatus = $dato->estatus;
			$this->id_persona = $dato->id_persona;
			$this->id_salon = $dato->id_salon;
		}
	}

	function insertaRegistro() {
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->tipo = $_POST['tipo'];
		$this->asistentes = $_POST['asistentes'];
		$this->acceso = $_POST['acceso'];
		$this->comentarios = $_POST['comentarios'];
		$this->fecha_inicio = $_POST['fecha_inicio'];
		$this->fecha_fin = $_POST['fecha_fin'];
		$this->hora_inicio = $_POST['hora_inicio'];
		$this->hora_fin = $_POST['hora_fin'];
		$this->estatus = $_POST['estatus'];
		$this->id_persona = $_POST['id_persona'];
		$this->id_salon = $_POST['id_salon'];

		$this->consulta =
		"insert into $this->tabla (nombre, tipo, asistentes, acceso, comentarios, fecha_inicio, fecha_fin, hora_inicio, hora_fin, estatus, id_persona, id_salon)".
		"values (".
		"'$this->nombre',".
		"'$this->tipo',".
		"'$this->asistentes',".
		"'$this->acceso',".
		"'$this->comentarios',".
		"'$this->fecha_inicio',".
	    "'$this->fecha_fin',".
	    "'$this->hora_inicio',".
	    "'$this->hora_fin',".
	    "'$this->estatus',".
	    "'$this->id_persona',".
	    "'$this->id_salon');";

		$this->ejecutaComandoIUD();

		$evento_id = $this->mbd->lastInsertId();
		
		require_once("Reserva.php");
		$reserva = new Reserva();
		$reserva->insertaRegistro($evento_id);
	}

	function actualizaRegistro() {
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->tipo = $_POST['tipo'];
		$this->asistentes = $_POST['asistentes'];
		$this->acceso = $_POST['acceso'];
		$this->comentarios = $_POST['comentarios'];
		$this->fecha_inicio = $_POST['fecha_inicio'];
		$this->fecha_fin = $_POST['fecha_fin'];
		$this->hora_inicio = $_POST['hora_inicio'];
		$this->hora_fin = $_POST['hora_fin'];
		$this->estatus = $_POST['estatus'];
		$this->id_persona = $_POST['id_persona'];
		$this->id_salon = $_POST['id_salon'];

		$this->consulta =
		"UPDATE $this->tabla set ".
		"nombre = '$this->nombre',".
		"tipo = '$this->tipo',".
		"asistentes = '$this->asistentes',".
		"acceso = '$this->acceso',".
		"comentarios = '$this->comentarios',".
		"fecha_inicio = '$this->fecha_inicio',".
		"fecha_fin = '$this->fecha_fin',".
		"hora_inicio = '$this->hora_inicio',".
		"hora_fin = '$this->hora_fin',".
		"estatus = '$this->estatus',".
		"id_persona = '$this->id_persona',".
		"id_salon = '$this->id_salon'".
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