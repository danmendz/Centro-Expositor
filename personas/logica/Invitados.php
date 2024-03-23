<?php require_once('Modelo.php');?>
<?php
class Invitado extends Modelo {
	public $id;
	public $id_persona;
    public $id_evento;
    public $id_area;
	public $estatus;

    function __construct() {
        parent::__construct();
        $this->tabla = "invitados";
    }

    function listaPendientes($id_cliente) {
        $this->consulta = "
        SELECT
            p.id AS persona_id,
            p.nombre AS persona_nombre,
            p.a_paterno,
            p.a_materno,
            p.telefono,
            e.id AS evento_id,
            e.nombre AS evento_nombre,
            i.estatus AS estatus_solicitud
        FROM
            invitados i
            INNER JOIN evento e ON i.id_evento = e.id
            INNER JOIN persona p ON i.id_persona = p.id
        WHERE
            e.id_persona = '$id_cliente' AND i.estatus = 'pendiente' ";

        $invitados = $this->encuentraTodos();

        return $invitados;
    }

    function listaAprobados($id_cliente) {
        $this->consulta = "
        SELECT
            p.id AS persona_id,
            p.nombre AS persona_nombre,
            p.a_paterno,
            p.a_materno,
            p.telefono,
            e.id AS evento_id,
            e.nombre AS evento_nombre,
            i.estatus AS estatus_solicitud
        FROM
            invitados i
            INNER JOIN evento e ON i.id_evento = e.id
            INNER JOIN persona p ON i.id_persona = p.id
        WHERE
            e.id_persona = '$id_cliente' AND i.estatus = 'aprobada' ";

        $invitados = $this->encuentraTodos();

        return $invitados;
    }

    function insertarRegistro() {
        $this->id_persona = $_POST['id_persona'];
        $this->id_evento = $_POST['id_evento'];;

        $this->consulta =
        "SELECT * FROM $this->tabla WHERE id_evento = $this->id_evento AND id_persona = $this->id_persona";
        $result = $this->ejecutaComandoIUD();

        if ($result->rowCount() == 0) {
            $this->consulta =
            "insert into $this->tabla (id_evento, id_persona)".
            "values (".
            "'$this->id_evento',".
            "'$this->id_persona');";

            $this->ejecutaComandoIUD();
        }
    }

    function aprobarInvitado($id_persona, $id_evento) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE id_persona = $id_persona AND id_evento = $id_evento ";
        $result = $this->encuentraUno();

        if ($result->num_rows == 0) {
            $this->consulta = "SELECT id FROM area WHERE id_evento = $id_evento ";
            $idArea = $this->encuentraUno();

            $id_area = $idArea->id;
            $this->consulta = "UPDATE $this->tabla SET estatus = 'aprobada', id_area = $id_area WHERE id_persona = '$id_persona' AND id_evento = '$id_evento' ";
            $this->ejecutaComandoIUD();
        }
    }

    function rechazarInvitado($id_persona, $id_evento) {
        $this->consulta =
        "DELETE FROM $this->tabla ".
        "WHERE id_persona = $id_persona AND id_evento = $id_evento; ";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id_persona, $id_evento) {
        $this->consulta =
            "SELECT * FROM $this->tabla WHERE id_evento = $id_evento AND id_persona = $id_persona";
            $result = $this->ejecutaComandoIUD();

        if ($result->rowCount() > 0) {
            
            $this->consulta =
                "DELETE FROM $this->tabla " .
                "WHERE id_persona = $id_persona AND id_evento = $id_evento";
            $this->ejecutaComandoIUD();
        }
    }

    function aprobaciones($id_persona) {
        $this->consulta = "
        SELECT
            i.id,
            i.id_persona,
            i.id_evento,
            i.estatus,
            e.id,
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
            e.id_persona,
            e.id_salon,
            p.id,
            p.nombre AS persona_nombre,
            p.a_paterno,
            p.a_materno,
            p.fecha_nac,
            p.correo,
            p.telefono,
            p.username,
            p.password,
            s.id,
            s.nombre AS salon_nombre

        FROM 
            invitados i
            INNER JOIN evento e ON e.id = i.id_evento
            INNER JOIN persona p ON p.id = i.id_persona
            INNER JOIN salon s ON s.id = e.id_salon
            
        WHERE i.id_persona = '$id_persona' AND i.estatus = 'aprobada' ";

        return $this->encuentraTodos();
    }
}
?>