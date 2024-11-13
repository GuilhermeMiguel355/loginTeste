<?php
include_once '../model/link.php';
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "existe"; 
    } else {
        echo "não existe"; 
    }
} else {
    echo "Parâmetro 'usuario' não fornecido.";
}
?>