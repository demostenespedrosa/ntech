<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>N-Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cadastroColaborador.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../assets/images/logo-fav.ico" />  
  <link rel="stylesheet" href="css/card.css">
</head>
  <body>
    
    <div id="navbar"></div>

    <?php
    include_once("../banco.php");

    // Obtém o ID do usuário da URL
    $id = $_GET['id'];

    // Busca as informações do usuário
    $result_usuario = "SELECT * FROM tipodechecklist WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    ?>

    <div class="cabecalho container">
      <div class="esquerda">
        <h1><?php echo $row_usuario['titulo']; ?></h1>
      </div>

      <div class="direita">
          <button type="button" class="btn btn-success botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>  Adicionar pergunta</button>
          <button type="button" class="btn btn-primary botao"><i class="bi bi-funnel"></i>  Filtros</button>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar pergunta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="salvar_pergunta.php" method="POST">
            <div class="mb-3">
                <label for="pergunta" class="form-label">Pergunta</label>
                <input type="text" class="form-control" id="pergunta" name="pergunta" required>
            </div>
            
            <div class="mb-3">
                  <label for="grupo_maquinas" class="form-label">Grupo de Máquinas</label>
                  <select class="form-select" id="gruposmaquinas" name="gruposmaquinas[]" multiple required>
                      <?php
                      // Loop para exibir os grupos de máquinas disponíveis
                      foreach ($gruposmaquinas as $grupo) {
                          echo "<option value='{$grupo['id']}'>{$grupo['nome_grupo']}</option>";
                      }
                      ?>
                  </select>
            </div>
            
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="bloqueia_maquina" name="bloqueia_maquina">
                <label class="form-check-label" for="bloqueia_maquina">
                    Bloqueia a máquina se a resposta for "Não está em bom funcionamento"
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary">Adicionar Pergunta</button>
        </form>
    </div>
    
        
    </div>
  </div>
</div>
        
      </div>
    </div>

    <div class="conteudo container">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Pergunta</th>
                <th scope="col">Resposta</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php
    $result_usuarios = "SELECT * FROM perguntaschecklist";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "<tr>";
        echo "<td>" . $row_usuario['titulo'] . "</td>";
        echo "<td>
                <a href='perfilMotivoChecklist.php?id=" . $row_usuario['id'] . "' class=btn btn-danger'>Excluir</a>
              </td>";
        echo "</tr>";
    }
    ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      $(function(){
          $('#navbar').load("src/navbar.php");
      });
  </script>
  
  
  </body>
</html>