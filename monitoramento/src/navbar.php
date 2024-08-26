<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>navbar</title>
</head>
<body>
<?php
session_start();
include('../../banco.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Prepara e executa a consulta para obter o nome do usuário
$sql = "SELECT nome FROM operadores WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($nome);
$stmt->fetch();
$stmt->close();

$conn->close();
?>


<nav class="navbar  navbar-expand-lg" style="background-color: #1CB3C8;">
  <div class="container">
    <a class="navbar-brand" href="../monitoramento/index.php">
      <img src="../assets/images/logo-branco.png" alt="N-Tech" width="80">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../monitoramento/index.php" style="color: #fff; font-weight: bold;">Mapa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"  style="color: #fff; font-weight: bold;">
            Cadastros
          </a>
          <ul class="dropdown-menu">
            <div class="menususpenso">
              <div class="bloco">
                <label for=""><strong>Operador</strong></label>
                <li><a href="../../../ntech/monitoramento/cadastroOperador.php" class="blocoItem dropdown-item">Operadores</a></li>
                <li><a href="../../../ntech/monitoramento/cadastroGrupoOperador.php" class="blocoItem dropdown-item">Grupo de operadores</a></li>
              </div>
              <div class="bloco">
                <label for=""><strong>Clientes</strong></label>
                  <li><a href="../../../ntech/monitoramento/cadastroCliente.php" class="blocoItem dropdown-item">Cliente</a></li>
                  <li><a href="../../../ntech/monitoramento/cadastroGrupoCliente.php" class="blocoItem dropdown-item">Grupo de clientes</a></li>
                  
              </div>
              <div class="bloco">
                <label for=""><strong>Equipamentos</strong></label>
                  <li><a href="..//../monitoramento/cadastroMaquinas.php" class="blocoItem dropdown-item">Máquinas</a></li>
              </div>
              <div class="bloco">
                <label for=""><strong>Checklist</strong></label>
                  <li><a href="../../../ntech/monitoramento/tiposChecklist.php" class="blocoItem dropdown-item">Tipos de checklist</a></li>
                  <li><a href="" class="blocoItem dropdown-item">Questionários</a></li>
              </div>
              <div class="bloco">
                <label for=""><strong>Outros</strong></label>
                  <li><a href="../../../ntech/monitoramento/motivosdepausa.php" class="blocoItem dropdown-item">Pausas</a></li>
                  <li><a href="" class="blocoItem dropdown-item">Permissões</a></li>
                  <li><a href="../../../ntech/monitoramento/gruposdeacesso.php" class="blocoItem dropdown-item">Grupos de acesso</a></li>
              </div>
            </div>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"  style="color: #fff; font-weight: bold;">
            Relatórios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Equipamentos</a></li>
            <li><a class="dropdown-item" href="../cadastroOperador.html">Operadores</a></li>
            <li><a class="dropdown-item" href="#">Checklists</a></li>
            <li><a class="dropdown-item" href="#">Baterias</a></li>
            <li><a class="dropdown-item" href="#">Rotas</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: #fff; font-weight: bold; cursor: pointer;">
            <?php echo htmlspecialchars($nome); ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i>  Meu Perfil</a></li>
            <li><a class="dropdown-item" href="../../../ntech/logout.php"><i class="bi bi-box-arrow-in-left"></i>  Sair</a></li>
            
          </ul>
        </div>
      </form>
    </div>
  </div>
</nav>
</body>
</html>

