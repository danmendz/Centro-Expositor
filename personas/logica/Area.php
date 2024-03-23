<?php require_once('Modelo.php');?>
<?php
class Area extends Modelo {
	public $id;
	public $nombre;
	public $capacidad;
	public $id_evento;

	function __construct() {
		parent::__construct();
		$this->tabla = "area";
	}

	function listarLibres() {
		$this->consulta = "SELECT * from $this->tabla where id_evento IS NULL";
		 // where  id_evento IS NULL LIMIT 1

		return $this->encuentraTodos();
	}

	function listarAsignadas($idPersona) {
	    $this->consulta =
	        "SELECT id FROM evento WHERE id_persona = '$idPersona'";
	    $eventos_ids_result = $this->encuentraTodos();

	    $eventos_ids = array(); // Inicializa un arreglo para almacenar los IDs

	    // Llena el arreglo con los IDs de eventos
	    foreach ($eventos_ids_result as $evento_id_obj) {
	        $eventos_ids[] = $evento_id_obj->id;
	    }

	    // Convierte el arreglo de IDs en una cadena separada por comas
	    $eventos_ids_str = implode(',', $eventos_ids);

	    // Asegúrate de envolver los valores en comillas simples si id_evento es una cadena de texto
	    $this->consulta = "SELECT * from $this->tabla where id_evento IN ($eventos_ids_str)";

	    return $this->encuentraTodos();
	}

	function areasAcceso($idPersona) {
        $this->consulta = "
        SELECT
            a.id,
            a.nombre,
            a.capacidad,
            e.id AS evento_id,
            e.nombre AS evento_nombre,
            s.id AS salon_id,
            s.nombre AS salon_nombre
        FROM invitados i
        JOIN evento e ON i.id_evento = e.id
        JOIN area a ON e.id = a.id_evento
        JOIN salon s ON e.id_salon = s.id
        WHERE i.id_persona = $idPersona AND i.estatus = 'aprobada'";

        return $this->encuentraTodos();
    }

	function recuperaRegistro($id) {
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)) {
			$this->id = $dato->id;
			$this->nombre = $dato->nombre;
			$this->capacidad = $dato->capacidad;
			$this->id_evento = $dato->id_evento;
		}
	}

	function insertaRegistro() {
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->capacidad = $_POST['capacidad'];
		$this->id_evento = $_POST['id_evento'];

		$this->consulta =
		"insert into $this->tabla (nombre, capacidad, id_evento)".
		"values (".
		"'$this->nombre',".
		"'$this->capacidad',".
	    "'$this->id_evento');";

		$this->ejecutaComandoIUD();
	}

	function asignarArea($idEvento){
	    $this->id_evento = $idEvento;

	    $this->consulta = "SELECT id FROM $this->tabla WHERE id_evento IS NULL LIMIT 1";
	    $existe = $this->encuentraUno();

	    if ($existe) {
	        $idAreaSinEvento = $existe->id;
	        $this->consulta = "UPDATE $this->tabla SET id_evento = $this->id_evento WHERE id = $idAreaSinEvento";
	        $this->ejecutaComandoIUD();
	    } else {
	        echo "No hay registros disponibles sin id_evento en la tabla.";
	    }
	}

	function actualizaRegistro() {
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->capacidad = $_POST['capacidad'];
		$this->id_evento = $_POST['id_evento'];

		$this->consulta =
		"UPDATE $this->tabla set ".
		"nombre = '$this->nombre',".
		"capacidad = '$this->capacidad',".
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