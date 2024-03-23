<?php require_once('Modelo.php');?>
<?php
class Invitados {
	public $id;
	public $id_persona;
	public $id_evento;

    function __construct() {
        parent::__construct();
        $this->tabla = "invitados";
    }

    function lista() {
        $this->consulta = "select * from $this->tabla";

        return $this->encuentraTodos();
    }
}
?>