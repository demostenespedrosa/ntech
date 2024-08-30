<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ntech";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $novoStatus = $_POST['status'];

    // Atualiza o status da máquina
    $sql = "UPDATE maquinas SET status = '$novoStatus' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Status atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o status: " . $conn->error;
    }

    // Redireciona de volta para a página de detalhes da máquina
    header("Location: perfilMaquina.php?id=$id");
}

$conn->close();
?>
