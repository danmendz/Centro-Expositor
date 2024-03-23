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

	function cajonesReservados($idPersona) {
	    $this->consulta = "
	    SELECT
	    r.id AS reserva_id,
	    r.fecha,
	    r.inicio,
	    r.fin,
	    c.*,
	    a.id AS id_area,
	    a.nombre

	    FROM $this->tabla r
		    JOIN cajon c ON r.id_cajon = c.id
		    JOIN area a ON c.id_area = a.id
	    WHERE r.id_persona = '$idPersona' AND c.estatus = 2 ";

	    return $this->encuentraTodos();
	}

	// function cajonesReservados($idPersona) {
	//     $this->consulta =
	//     "SELECT * FROM $this->tabla WHERE id_persona = '$idPersona'";
	//     $cajones_ids_result = $this->encuentraTodos();

	//     $cajones_ids = array();
	//     foreach ($cajones_ids_result as $cajon_id_obj) {
	//         $cajones_ids[] = $cajon_id_obj->id;
	//     }

	//     $cajones_ids_string = implode(',', $cajones_ids);

	//     $this->consulta = 
	//     "SELECT * FROM cajon WHERE id IN ($cajones_ids_string)";
	//     $ids = $this->encuentraTodos();

	//     return $ids;
	// }

	function listarPendientes($idPersona) {
	    $this->consulta = "SELECT * FROM $this->tabla WHERE id_persona = $idPersona AND estatus = 0";

	    return $this->encuentraTodos();
	}

	function listarReservados($idPersona) {
	    $this->consulta = "SELECT * FROM $this->tabla WHERE id_persona = $idPersona AND estatus = 1";

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
            "UPDATE $this->tabla SET ".
            "estatus = 1 ".
            "WHERE id_persona = '$id_persona' AND id_cajon = '$id_cajon' ";
            $this->ejecutaComandoIUD();
        }
    }

    function rechazarReserva($id_persona, $id_cajon) {
        $this->consulta =
        "DELETE FROM $this->tabla ".
        "WHERE id_persona = $id_persona AND id_cajon = $id_cajon; ";

        $this->ejecutaComandoIUD();
    }

	// function insertaRegistro($id_persona, $id_cajon, $inicio, $finalizacion) {

	//     $this->id_persona = $id_persona;
	//     $this->id_cajon = $id_cajon;
	//     $this->inicio = $inicio;
	//     $this->finalizacion = $finalizacion;

	//     $this->consulta =
	//         "INSERT INTO $this->tabla (id_persona, id_cajon, inicio, finalizacion) " .
	//         "VALUES (" .
	//         "$this->id_persona," .
	//         "$this->id_cajon," .
	//         "'$this->inicio'," .
	//         "'$this->finalizacion')";

	//     $this->ejecutaComandoIUD();
	// }

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

	function eliminaRegistro($id){
		$this->consulta =
		"delete from $this->tabla ".
		"where id = $id;";

		$this->ejecutaComandoIUD();
	}
}
?>