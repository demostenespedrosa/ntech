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

// Consulta SQL para obter as localizações das máquinas
$sql = "SELECT id, latitude, longitude FROM maquinas";
$result = $conn->query($sql);

$machines = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $machines[] = $row;
    }
}

// Retorna os dados como JSON
header('Content-Type: application/json');
echo json_encode($machines);

// Fecha a conexão
$conn->close();
?>
