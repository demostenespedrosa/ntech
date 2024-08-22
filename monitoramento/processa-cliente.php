<?php
include_once("../banco.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$id = $_POST['id'];
$matricula = $_POST['matricula'];
$CPFouCNPJ = $_POST['CPFouCNPJ'];
$razao = $_POST['razao'];
$endereco = $_POST['endereco'];
$responsavel = $_POST['responsavel'];
$telefoneColaborador = $_POST['	telefoneColaborador'];
$logo = $_POST['logo'];

$result_usuario = "INSERT INTO clientes (nome, email, telefone, id, matricula, CPFouCNPJ, razao, endereco, responsavel, telefoneColaborador, logo) VALUES ('$nome', '$email', '$telefone', '$id', '$matricula', '$CPFouCNPJ', '$razao', '$endereco', '$responsavel', '$telefoneColaborador', '$logo')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o cliente.";
}

// Redireciona de volta para o index.php
header("Location: cadastroCliente.php");
exit();
?>
