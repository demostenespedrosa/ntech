<?php
// Conexão com o banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ntech";

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se os dados foram recebidos
if (isset($_POST['id']) && isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $car_id = $_POST['id'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Consulta SQL para atualizar as coordenadas do carro existente
    $sql = "UPDATE maquinas SET latitude = ?, longitude = ? WHERE id = ?";

    // Preparar a consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular os parâmetros
        $stmt->bind_param("ddi", $latitude, $longitude, $car_id);

        // Executar a consulta
        if ($stmt->execute()) {
            echo "Localização atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar localização: " . $stmt->error;
        }

        // Fechar a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
} else {
    echo "Dados incompletos.";
}

// Fechar a conexão
$conn->close();
?>
