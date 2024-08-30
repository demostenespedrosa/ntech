<?php
include_once("../banco.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];


$result_usuario = "INSERT INTO tipodechecklist (titulo, descricao) VALUES ('$titulo', '$descricao')";
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
