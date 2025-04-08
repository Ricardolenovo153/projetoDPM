<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "baseDados";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Falha na ligação à base de dados: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>