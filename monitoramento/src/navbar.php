<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .dropdown-menu {
    border: none;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
    }
  </style>
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
?>


<nav class="navbar  navbar-expand-lg" style="background-color: #34aae1;">
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
          <a class="nav-link active" aria-current="page" href="../monitoramento/index.php" style="color: #fff; font-weight: bold;"><i class="bi bi-geo-alt-fill"></i>  Mapa</a>
        </li>
        <li class="nav-item dropdown"  id="dropdownMenu">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"  style="color: #fff; font-weight: bold;">
          <i class="bi bi-database-fill-add"></i>  Cadastros
          </a>
          <ul class="dropdown-menu">
            <div class="menususpenso">
              <div class="bloco">
                <label for=""><strong>Operador</strong></label>
                <li><a href="../../../ntech/monitoramento/cadastroOperador.php" class="blocoItem dropdown-item"><i class="bi bi-person-fill-gear"></i>  Operadores</a></li>
                <li><a href="../../../ntech/monitoramento/cadastroGrupoOperador.php" class="blocoItem dropdown-item"><i class="bi bi-people-fill"></i>  Grupo de operadores</a></li>
              </div>
              <div class="bloco">
                <label for=""><strong>Clientes</strong></label>
                  <li><a href="../../../ntech/monitoramento/cadastroCliente.php" class="blocoItem dropdown-item"><i class="bi bi-person-fill"></i>  Cliente</a></li>
                  <li><a href="../../../ntech/monitoramento/cadastroGrupoCliente.php" class="blocoItem dropdown-item"><i class="bi bi-people-fill"></i>  Grupo de clientes</a></li>
                  
              </div>
              <div class="bloco">
                <label for=""><strong>Equipamentos</strong></label>
                  <li><a href="..//../monitoramento/cadastroMaquinas.php" class="blocoItem dropdown-item"><i class="bi bi-truck-flatbed"></i>  Máquinas</a></li>
                  <li><a href="../../../ntech/monitoramento/tiposChecklist.php" class="blocoItem dropdown-item"><i class="bi bi-card-checklist"></i>  Checklist</a></li>
              </div>
              <div class="bloco">
                <label for=""><strong>Outros</strong></label>
                  <li><a href="../../../ntech/monitoramento/motivosdepausa.php" class="blocoItem dropdown-item"><i class="bi bi-slash-circle-fill"></i>  Pausas</a></li>
                  <li><a href="" class="blocoItem dropdown-item"><i class="bi bi-person-fill-lock"></i>  Permissões</a></li>
                  <li><a href="../../../ntech/monitoramento/gruposdeacesso.php" class="blocoItem dropdown-item"><i class="bi bi-shield-lock-fill"></i>  Grupos de acesso</a></li>
              </div>
            </div>
          </ul>
        </li>
        <li class="nav-item dropdown"  id="dropdownMenu1">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"  style="color: #fff; font-weight: bold;">
          <i class="bi bi-file-earmark-bar-graph-fill"></i>  Relatórios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-truck-flatbed"></i>  Equipamentos</a></li>
            <li><a class="dropdown-item" href="../cadastroOperador.html"><i class="bi bi-person-fill-gear"></i>  Operadores</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-card-checklist"></i>  Checklists</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-sign-turn-right"></i>  Rotas</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <div class="dropdown">
          <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: #fff; font-weight: bold; cursor: pointer;">
            <?php echo htmlspecialchars($nome); ?>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="perfilOperador.php?id=<?php echo $usuario_id; ?>"><i class="bi bi-person"></i>  Meu Perfil</a>
            </li>
            <li><a class="dropdown-item" href="../../../ntech/logout.php"><i class="bi bi-box-arrow-in-left"></i>  Sair</a></li>
          </ul>
        </div>
      </form>
    </div>
  </div>
</nav>

<?php $conn->close(); ?>


<script>
  const dropdown = document.getElementById('dropdownMenu');

  dropdown.addEventListener('mouseover', function() {
    const dropdownMenu = dropdown.querySelector('.dropdown-menu');
    dropdownMenu.classList.add('show');
  });

  dropdown.addEventListener('mouseleave', function() {
    const dropdownMenu = dropdown.querySelector('.dropdown-menu');
    dropdownMenu.classList.remove('show');
  });
</script>
<script>
  const dropdown1 = document.getElementById('dropdownMenu1');

  dropdown1.addEventListener('mouseover', function() {
    const dropdownMenu1 = dropdown1.querySelector('.dropdown-menu');
    dropdownMenu1.classList.add('show');
  });

  dropdown1.addEventListener('mouseleave', function() {
    const dropdownMenu1 = dropdown1.querySelector('.dropdown-menu');
    dropdownMenu1.classList.remove('show');
  });
</script>
</body>
</html>
