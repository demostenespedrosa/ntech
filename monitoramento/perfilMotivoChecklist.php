
  <?php
// Inclua seu arquivo de conexão com o banco de dados
include '../banco.php'; // Este arquivo deve conter a conexão com o banco de dados

// Obtenha o nome do grupo da URL
$grupo_nome = $_GET['id'];

// Prepare a consulta SQL
$sql = "SELECT * FROM questionario WHERE tipo = ?";

// Prepare a declaração
$stmt = $mysqli->prepare($sql);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($mysqli->error));
}

// Bind do parâmetro
$stmt->bind_param('s', $grupo_nome);

// Execute a consulta
$stmt->execute();

// Obtenha os resultados
$result = $stmt->get_result();
$perguntas = $result->fetch_all(MYSQLI_ASSOC);

// Feche a declaração
$stmt->close();

// Feche a conexão
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Grupo</title>
</head>
<body>
    <h1>Perguntas do Grupo: <?php echo htmlspecialchars($grupo_nome); ?></h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Pergunta</th>
            <th>Tipo</th>
        </tr>
        <?php foreach ($perguntas as $pergunta): ?>
        <tr>
            <td><?php echo htmlspecialchars($pergunta['id']); ?></td>
            <td><?php echo htmlspecialchars($pergunta['pergunta']); ?></td>
            <td><?php echo htmlspecialchars($pergunta['tipo']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>