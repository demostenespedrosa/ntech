<?php
include 'conexao.php'; // Conexão com o banco de dados

$pergunta = $_POST['pergunta'];
$gruposmaquinas = $_POST['gruposmaquinas'];
$bloqueia_maquina = isset($_POST['bloqueia_maquina']) ? 1 : 0;
$tipodechecklist = $_GET['tipodechecklist_id'];

// Inserir a pergunta no banco de dados
$query = "INSERT INTO perguntasChecklist (tipodechecklist_id, pergunta, bloqueia_maquina) 
          VALUES ('$tipodechecklist_id', '$pergunta', '$bloqueia_maquina')";
mysqli_query($conn, $query);

$pergunta_id = mysqli_insert_id($conn);

// Associar a pergunta aos grupos de máquinas
foreach ($grupo_maquinas as $grupo_maquina_id) {
    $query = "INSERT INTO perguntasgrupomaquinas (pergunta_id, grupo_maquina_id) 
              VALUES ('$pergunta_id', '$grupo_maquina_id')";
    mysqli_query($conn, $query);
}

header("Location: perfilChecklist.php?tipodechecklist_id=$tipodechecklist_id");
exit;
?>
