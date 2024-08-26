<?php
include_once("../banco.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$id = $_POST['id'];


$result_usuario = "INSERT INTO gruposoperadores (nome, descricao, id) VALUES ('$nome', '$descricao', '$id')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    echo "Grupo cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o grupo.";
}

// Redireciona de volta para o index.php
header("Location: cadastroGrupoOperador.php");
exit();
?>
