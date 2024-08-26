<?php
include_once("../banco.php");
?>

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
</head>
  <body>
    
    <div id="navbar"></div>

    <div class="cabecalho container">
      <div class="esquerda">
        <h1>Gerenciar grupos de operadores</h1>
      </div>

      <div class="direita">
          <button type="button" class="btn btn-success botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>  Adicionar grupo de operadores</button>
          <button type="button" class="btn btn-primary botao"><i class="bi bi-funnel"></i>  Filtros</button>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar grupo de operadores</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="processa-grupoOperador.php" method="post">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nome do grupo</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="nome" placeholder="Exemplo: Gerência">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Descrição do grupo</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3" placeholder="Exemplo: Uma descrição breve de que grupo é esse."></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Adicionar grupo de operadores">
      </div>
    </form>
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
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php
    $result_usuarios = "SELECT * FROM gruposoperadores";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "<tr>";
        echo "<td>" . $row_usuario['nome'] . "</td>";
        echo "<td>" . $row_usuario['descricao'] . "</td>";
        echo "<td>
                <a href='deletarGrupoOperador.php?id=" . $row_usuario['id'] . "'>Excluir</a>
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