<?php require_once('Modelo.php');?>
<?php
class ReservaCajon extends Modelo {
	public $id;
	public $id_persona;
	public $id_cajon;
	public $estatus;
	public $fecha;
	public $inicio;
	public $fin;

	function __construct() {
		parent::__construct();
		$this->tabla = "reservacionCajon";
	}

	function infoReserva($idReserva) {
        $this->consulta = "
        SELECT
        	r.id,
			r.id_persona,
			r.id_cajon,
			r.estatus,
			r.fecha,
			r.inicio,
			r.fin,
			p.id AS persona_id,
			p.nombre AS persona_nombre,
            p.a_paterno,
            p.a_materno,
            p.telefono,
            p.correo,
            c.id AS cajon_id,
            c.numero,
            c.estatus AS estatus_cajon,
            c.id_area,
            a.id AS area_id,
            a.nombre AS area_nombre,
            a.capacidad,
            a.id_evento,
            e.id AS evento_id,
            e.nombre AS evento_nombre,
			e.tipo,
			e.asistentes,
			e.acceso,
			e.comentarios,
			e.fecha_inicio,
			e.fecha_fin,
			e.hora_inicio,
			e.hora_fin, 
			e.estatus AS evento_estatus,
			e.id_salon,
			s.nombre AS salon_nombre
        FROM
            reservacionCajon r
            LEFT JOIN persona p ON p.id = r.id_persona
            LEFT JOIN cajon c ON c.id = r.id_cajon
            LEFT JOIN area a ON a.id = c.id_area
            LEFT JOIN evento e ON e.id = a.id_evento
            LEFT JOIN salon s ON s.id = e.id_salon
        WHERE r.id = $idReserva";

        return $this->encuentraUno();
    }

	function lista() {
		$this->consulta = "SELECT * from $this->tabla where estatus = 0";

		return $this->encuentraTodos();
	}

	function listarReservados() {
		$this->consulta = "SELECT * from $this->tabla where estatus = 1";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->id = $dato->id;
			$this->id_persona = $dato->id_persona;
			$this->id_cajon = $dato->id_cajon;
			$this->estatus = $dato->estatus;
			$this->inicio = $dato->inicio;
			$this->finalizacion = $dato->finalizacion;
		}
	}

	function insertarRegistro() {
		$this->id_persona = $_POST['id_persona'];
		$this->id_cajon = $_POST['id_cajon'];
		$this->inicio = $_POST['inicio'];
		$this->fin = $_POST['fin'];
		$this->fecha = $_POST['fecha'];

        $this->consulta =
        "SELECT * FROM $this->tabla WHERE id_cajon = $this->id_cajon AND id_persona = $this->id_persona";
        $result = $this->ejecutaComandoIUD();

        if ($result->rowCount() == 0) {
            $this->consulta = 
			"insert into $this->tabla (id_persona, id_cajon, inicio, fin, fecha) ".
			"values ( ".
			"'$this->id_persona',".
			"'$this->id_cajon',".
			"'$this->inicio',".
			"'$this->fin',".
		    "'$this->fecha');";

            $this->ejecutaComandoIUD();
        }
    }

	function aprobarReserva($id_persona, $id_cajon) {
	    $this->consulta = 
	        "SELECT * FROM $this->tabla WHERE id_persona = $id_persona AND id_cajon = $id_cajon; ";
	    	$result = $this->ejecutaComandoIUD();

		    if ($result->num_rows == 0) {
		        $this->consulta = 
		            "UPDATE reservacionCajon r " .
		            "JOIN cajon c ON c.id = r.id_cajon " .
		            "SET r.estatus = 1, c.estatus = 2 " .
		            "WHERE id_persona = '$id_persona' AND id_cajon = '$id_cajon'";
		        $this->ejecutaComandoIUD();
		    }
	}

    function rechazarReserva($id_persona, $id_cajon) {
        $this->consulta =
        "DELETE FROM $this->tabla ".
        "WHERE id_persona = $id_persona AND id_cajon = $id_cajon; ";

        $this->ejecutaComandoIUD();
    }

	function actualizaRegistro() {
		$this->id = $_POST['id'];
		$this->id_persona = $_POST['id_persona'];
		$this->id_cajon = $_POST['id_cajon'];
		$this->inicio = $_POST['inicio'];
		$this->finalizacion = $_POST['finalizacion'];

		$this->consulta =
		"UPDATE $this->tabla set ".
		"id_persona = '$this->id_persona',".
		"id_cajon = '$this->id_cajon'".
		"inicio = '$this->inicio'".
		"finalizacion = '$this->finalizacion'".
		"where id = $this->id";

		$this->ejecutaComandoIUD();
	}

	function eliminaRegistro($id_persona, $id_cajon) {
	    $this->consulta =
	        "SELECT * FROM $this->tabla WHERE id_cajon = $id_cajon AND id_persona = $id_persona";
	    	$result = $this->ejecutaComandoIUD();

	    if ($result->rowCount() > 0) {
	        
	        $this->consulta =
	            "DELETE FROM $this->tabla " .
	            "WHERE id_persona = $id_persona AND id_cajon = $id_cajon";
	        $this->ejecutaComandoIUD();

	        $this->consulta =
	            "UPDATE cajon " .
	            "SET estatus = 0 " .
	            "WHERE id = $id_cajon";
	        $this->ejecutaComandoIUD();
	    }
	}

}
?>