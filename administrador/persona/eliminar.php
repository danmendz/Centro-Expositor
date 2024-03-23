<?php require_once('../logica/Persona.php');?>
<?php 

$persona = new Persona();
if (isset($_GET['id'])) {
    $persona->eliminaRegistro($_GET['id']);
}

header("Location: ../index.php");
?>