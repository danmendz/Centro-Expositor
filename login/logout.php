<?php
session_start();
$username = $_SESSION['username'];
if (isset($username)) {
	session_unset();
	header("Location: ../index.php");
}
?>