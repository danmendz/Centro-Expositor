<?php require_once('Modelo.php');?>
<?php 
class Evento extends Modelo{
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

	function lista($id) {
		// $this->consulta = "SELECT * FROM $this->tabla WHERE id_persona = '$id' ";
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

	function mostrar($id_cliente) {
		$this->consulta =
		"SELECT id FROM evento WHERE id_persona = '$id_cliente'";
		$eventos_ids_result = $this->encuentraTodos();

		$eventos_ids = array(); // Inicializa un arreglo para almacenar los IDs

		// Llena el arreglo con los IDs de eventos
		foreach ($eventos_ids_result as $evento_id_obj) {
		    $eventos_ids[] = $evento_id_obj->id;
		}

		// Convierte el arreglo de IDs en una cadena separada por comas
		$eventos_ids_str = implode(',', $eventos_ids);

		if (!empty($eventos_ids_str)) {
		    $this->consulta = "
	        SELECT
	        e.id AS evento_id,
	        e.fecha_inicio,
	        e.fecha_fin,
	        e.hora_inicio,
	        e.hora_fin,
	        e.estatus,
	        e.nombre AS evento_nombre,
	        e.tipo,
	        e.asistentes,
	        e.acceso,
	        e.comentarios,
	        s.nombre AS salon_nombre,
	        p.id AS persona_id,
	        p.username,
	        p.nombre AS persona_nombre,
	        p.a_paterno,
	        p.a_materno,
	        p.fecha_nac,
	        p.correo,
	        p.telefono
	        FROM evento e
	        INNER JOIN persona p ON p.id = e.id_persona
	        INNER JOIN salon s ON s.id = e.id_salon
	        WHERE e.id NOT IN ($eventos_ids_str) AND e.estatus != 'cancelado' AND e.estatus != 'finalizado'";

	        $datos = $this->encuentraTodos();
		} else {
		    // Manejo de caso en que no hay eventos para excluir
		    $this->consulta = "
	        SELECT
	        e.id AS evento_id,
	        e.fecha_inicio,
	        e.fecha_fin,
	        e.hora_inicio,
	        e.hora_fin,
	        e.estatus,
	        e.nombre AS evento_nombre,
	        e.tipo,
	        e.asistentes,
	        e.acceso,
	        e.comentarios,
	        s.nombre AS salon_nombre,
	        p.id AS persona_id,
	        p.username,
	        p.nombre AS persona_nombre,
	        p.a_paterno,
	        p.a_materno,
	        p.fecha_nac,
	        p.correo,
	        p.telefono
	        FROM evento e
	        INNER JOIN persona p ON p.id = e.id_persona
	        INNER JOIN salon s ON s.id = e.id_salon
	        WHERE e.estatus != 'cancelado' AND e.estatus != 'finalizado'";

	        $datos = $this->encuentraTodos();
		}

		return $datos;
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
		$this->id_persona = $_POST['id_persona'];
		$this->id_salon = $_POST['id_salon'];

		$this->consulta =
		"insert into $this->tabla (nombre, tipo, asistentes, acceso, comentarios, fecha_inicio, fecha_fin, hora_inicio, hora_fin, id_persona, id_salon)".
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
	    "'$this->id_persona',".
	    "'$this->id_salon');";

		$this->ejecutaComandoIUD();

		$evento_id = $this->mbd->lastInsertId();
		require_once("Reserva.php");
		$reserva = new Reserva();
		$reserva->insertaRegistro($evento_id);

		// $salon_id = $this->id_salon;
		// require_once("Salon.php");
		// $salon = new Salon();
		// $salon->actualizaEstatus($salon_id);
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
		"hora_fin = '$this->hora_fin'".
		"where id = $this->id";

		$result = $this->ejecutaComandoIUD();
	    return $result !== false;
	}

	function eliminaRegistro($id, $id_salon) {

		$this->consulta =
		"UPDATE $this->tabla ".
		"SET estatus = 'cancelado' ".
		"where id = $id;";
		$this->ejecutaComandoIUD();

		$this->consulta =
		"DELETE FROM reserva WHERE id_evento = '$id' ";
		$this->ejecutaComandoIUD();

		$this->consulta =
		"UPDATE salon ".
		"SET estatus = 'disponible' ".
		"WHERE id = '$id_salon' ";
		$this->ejecutaComandoIUD();
		
	}

}
?>