<?php

$host = "db5014807879.hosting-data.io";
$username = "dbu2703780";
$password = "eventosintegradora01";
$database = "dbs12303228";
$table = "persona";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>