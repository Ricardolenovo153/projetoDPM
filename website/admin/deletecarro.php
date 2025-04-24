<?php
include '../php/connection.php';
$id = $_GET['id'];
$conn->query("DELETE FROM carro WHERE id=$id");
header("Location: admin.html");
exit();