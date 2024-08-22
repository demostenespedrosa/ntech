<?php
include_once("../banco.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$id = $_POST['id'];
$matricula = $_POST['matricula'];
$tipoDeOperador = $_POST['tipoDeOperador'];
$fotoPerfil = $_POST['fotoPerfil'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$maquinas = $_POST['maquinas'];

// Verificar se o ID e outros dados foram fornecidos
if (!isset($id) || empty($id) || !isset($nome) || !isset($email) || !isset($telefone) || !isset($matricula) || !isset($tipoDeOperador) || !isset($fotoPerfil) || !isset($cpf) || !isset($endereco) || !isset($usuario) || !isset($senha) || !isset($maquinas)) {
    die("Dados inválidos.");
}

$result_usuario = "UPDATE operadores SET nome='$nome', email='$email', telefone='$telefone', matricula='$matricula', tipoDeOperador='$tipoDeOperador', fotoPerfil='$fotoPerfil', cpf='$cpf', endereco='$endereco', usuario='$usuario', senha='$senha', maquinas='$maquinas'  WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
    // Redireciona de volta para o index.php
    header("Location: perfilOperador.php");
    exit();
} else {
    echo "Erro ao editar o usuário.";
}
?>
