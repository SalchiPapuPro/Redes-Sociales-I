<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["usuario"];
    $correo = $_POST["correo"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre_usuario, correo, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user, $correo, $pass);

    if ($stmt->execute()) {
        echo "Cuenta creada correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
