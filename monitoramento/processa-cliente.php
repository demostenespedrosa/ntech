<?php
include_once("../banco.php");

// Diretório onde as imagens serão salvas
$diretorio = "../assets/uploads/";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$id = $_POST['id'];
$matricula = $_POST['matricula'];
$CPFouCNPJ = $_POST['CPFouCNPJ'];
$razao = $_POST['razao'];
$endereco = $_POST['endereco'];
$responsavel = $_POST['responsavel'];
$telefoneColaborador = $_POST['	telefoneResponsavel'];
$logo = $_POST['logo'];

$result_usuario = "INSERT INTO clientes (nome, email, telefone, id, matricula, CPFouCNPJ, razao, endereco, responsavel, telefoneResponsavel, logo) VALUES ('$nome', '$email', '$telefone', '$id', '$matricula', '$CPFouCNPJ', '$razao', '$endereco', '$responsavel', '$telefoneResponsavel', '$logo')";
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
