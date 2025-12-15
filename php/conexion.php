<?php
$conn = new mysqli("localhost", "root", "", "infosocial", 3308);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
