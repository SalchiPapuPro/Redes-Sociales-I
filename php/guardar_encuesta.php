<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION["id"])) {
    die("Debe iniciar sesión");
}

$uid = $_SESSION["id"];
$p1 = $_POST["p1"];
$p2 = $_POST["p2"];
$p3 = $_POST["p3"];
$p4 = $_POST["p4"];
$p5 = $_POST["p5"];

$sql = "INSERT INTO encuestas (usuario_id, p1, p2, p3, p4, p5) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiiii", $uid, $p1, $p2, $p3, $p4, $p5);

if ($stmt->execute()) {
    header("Location: ../test.html");
} else {
    echo "Error: " . $conn->error;
}
?>
