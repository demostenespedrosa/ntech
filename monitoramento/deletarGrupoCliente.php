<?php
include_once("../banco.php");

// Obtém o ID do usuário do formulário
$id = $_POST['id'];

// Verificar se o ID foi fornecido
if (!isset($id) || empty($id)) {
    die("ID inválido.");
}

// Excluir o usuário
$result_usuario = "DELETE FROM gruposclientes WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn)) {
    // Redireciona de volta para o index.php
    header("Location: cadastroGrupoCliente.php");
    exit();
} else {
    echo "Erro ao excluir o grupo.";
}
?>