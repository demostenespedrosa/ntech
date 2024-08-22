<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "ntech";

// Criar conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Verificar conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
