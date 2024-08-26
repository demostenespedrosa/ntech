<?php
include_once("../banco.php");

$nome = $_POST['nome'];
$id = $_POST['id'];


$result_usuario = "INSERT INTO tipodechecklist (nome, id) VALUES ('$nome', '$id')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    echo "Tipo cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o Tipo de checklist.";
}

// Redireciona de volta para o index.php
header("Location: tiposChecklist.php");
exit();
?>
