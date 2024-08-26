<?php
include_once("../banco.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$id = $_POST['id'];


$result_usuario = "INSERT INTO motivosdepausa (nome, id) VALUES ('$nome', '$id')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    echo "Motivo cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o Motivo.";
}

// Redireciona de volta para o index.php
header("Location: motivosdepausa.php");
exit();
?>
