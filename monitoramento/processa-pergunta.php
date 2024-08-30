<?php
// Adicionando perguntas ao questionário
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar_pergunta'])) {
    $texto = $_POST['texto'];
    $tipo = $_POST['tipo'];
    $opcoes = $_POST['opcoes'] ? json_encode(explode(",", $_POST['opcoes'])) : null;
    $query = "INSERT INTO perguntas (tipodechecklist_id, texto, tipo, opcoes) VALUES ('$tipodechecklist_id', '$texto', '$tipo', '$opcoes')";
    mysqli_query($conn, $query);
}
?>