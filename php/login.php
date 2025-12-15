<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["gmail"];
    $pass = $_POST["contrasena"];

    $sql = "SELECT id, password FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($id, $hash);
        $stmt->fetch();

     
        if (password_verify($pass, $hash)) {
            $_SESSION["id"] = $id;
            $_SESSION["usuario"] = $user;

            header("Location: ../index.html");
            exit();
            
        } else {
            echo "Contraseña incorrecta";
        }

    } else {
        echo "Usuario no encontrado";
    }
}
?>
