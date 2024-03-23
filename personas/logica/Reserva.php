<?php require_once('Modelo.php');?>
<?php
class Reserva extends Modelo {
	public $id;
	public $id_evento;
	public $estatus;

    function __construct() {
		parent::__construct();
		$this->tabla = "reserva";
	}

	function lista($id_cliente) {
		require_once("Evento.php");
		$evento = new Evento();

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
		e.id_persona,
		e.id_salon,
		s.id,
		s.nombre AS salon_nombre,
		s.capacidad,
		s.precio,
		s.tamano,
		r.id,
	    r.id_evento,
	    r.estatus
	    FROM evento e
	    INNER JOIN reserva r ON r.id_evento = e.id
	    INNER JOIN salon s ON s.id = e.id_salon
	    WHERE e.id_persona = $id_cliente";

	    $datos = $this->encuentraTodos();
	    return $datos;

		// $this->consulta = 
		// "SELECT * FROM evento WHERE id_persona = '$id_usuario' ";

		// $evento = $this->encuentraTodos();
		// return $evento;

		// if (!empty($evento)) {
		// 	$this->consulta =
		// 	"SELECT * FROM $this->tabla WHERE id_evento = '$evento->id' ";
		// 	$reserva = $this->encuentraTodos();
		// 	return $reserva;
		// }
	}

	function recuperaRegistro($id) {
	    $this->consulta = "
	    SELECT
	    r.id,
	    r.id_evento,
	    r.estatus,
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
		s.id,
		s.nombre,
		s.capacidad,
		s.precio,
		s.tamano,
		s.pais,
		s.estado,
		s.ciudad,
		s.direccion,
		s.estatus,
		p.id,
		p.nombre,
		p.a_paterno,
		p.a_materno,
		p.fecha_nac,
		p.correo,
		p.telefono,
		p.username,
		p.password
		FROM reserva r
		INNER JOIN evento e ON e.id = r.id_evento
		INNER JOIN persona p ON p.id = e.id_persona
		INNER JOIN salon s ON s.id = e.id_salon
	    WHERE r.id = $id";

	    $datos = $this->encuentraTodos();

	    if (!empty($datos)) {
	        $this->id_evento = $datos[0]->id_evento;
	        $this->estatus = $datos[0]->estatus;
	    }
	}

	function aprobarEvento($idEvento) {

		$stmt = $this->mbd->prepare("CALL estatus_reserva_evento(:eventoID)");
	    $stmt->bindParam(':eventoID', $idEvento, PDO::PARAM_INT);
	    
	    $stmt->execute();
	}

	function insertaRegistro($idEvento) {
		$this->id_evento = $idEvento;

		$this->consulta =
		"insert into $this->tabla (id_evento)".
		"values (".
	    "'$this->id_evento');";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro() {
		$this->id = $_POST['id'];
		$this->estatus = $_POST['estatus'];
		$this->id_evento = $_POST['id_evento'];

		$this->consulta =
		"UPDATE $this->tabla SET ".
		"estatus = '$this->estatus',".
		"id_evento = '$this->id_evento'".
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