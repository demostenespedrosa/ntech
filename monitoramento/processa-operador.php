<?php
include_once("../banco.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$id = $_POST['id'];
$matricula = $_POST['matricula'];
$tipoDeOperador = $_POST['tipoDeOperador'];
$gruposoperadores = $_POST['gruposoperadores'];
$fotoPerfil = $_POST['fotoPerfil'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$maquinas = $_POST['maquinas'];

$result_usuario = "INSERT INTO operadores (nome, email, telefone, id, matricula, tipoDeOperador, fotoPerfil, cpf, endereco, usuario, senha, maquinas, gruposoperadores) VALUES ('$nome', '$email', '$telefone', '$id', '$matricula', '$tipoDeOperador', '$fotoPerfil', '$cpf', '$endereco', '$usuario', '$senha', '$maquinas', '$gruposoperadores')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o usuário.";
}

// Redireciona de volta para o index.php
header("Location: cadastroOperador.php");
exit();
?>
