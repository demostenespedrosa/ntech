<?php
session_start();
include('banco.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Prepara e executa a consulta
    $sql = "SELECT id, senha FROM operadores WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $senha_hash);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        // Verifica a senha
        if (password_verify($senha, $senha_hash)) {
            $_SESSION['usuario_id'] = $id;
            header("Location: monitoramento/index.php");
            exit();
        } else {
            $erro = "Usuário ou senha inválidos.";
        }
    } else {
        $erro = "Usuário ou senha inválidos.";
    }

    $stmt->close();
}

$conn->close();
?>
