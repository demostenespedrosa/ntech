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
        <h1>Gerenciar Operadores</h1>
      </div>

      <div class="direita">
          <button type="button" class="btn btn-success botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>  Adicionar operador</button>
          <button type="button" class="btn btn-primary botao"><i class="bi bi-funnel"></i>  Filtros</button>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Operador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="processa-operador.php" method="post">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="mb-3" style="margin-top: 10px;">
              <label for="formFile" class="form-label">Foto de perfil</label>
              <input class="form-control" name="fotoPerfil" type="file" id="formFile">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nome completo</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="nome" placeholder="Exemplo: Fulano de Tal">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Usuario</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="usuario" placeholder="Exemplo: fulano.empresa">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Matrícula</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="matricula" placeholder="Exemplo: 123456897">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Tipo de operador</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="tipoDeOperador" placeholder="Exemplo: Operador de empilhadeira">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">E-mail</label>
              <input type="email" class="form-control" required id="exampleFormControlInput1" name="email" placeholder="Exemplo: nome@exemplo.com">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Telefone</label>
              <input type="tel" class="form-control" required id="exampleFormControlInput1" name="telefone" placeholder="Exemplo: (81) 99911-0011">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CPF</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="cpf" placeholder="Exemplo: 000-000-000.00">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Endereço</label>
              <input type="text" class="form-control"  id="exampleFormControlInput1" name="endereco" placeholder="Exemplo: Rua, Bairro, Cidade, Estado e CEP">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Senha</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="senha" placeholder="Exemplo: .........">
            </div>
            <input type="hidden" name="maquinas" value="nenhuma">
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Adicionar operador">
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
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Tipo de operador</th>
                <th scope="col">Máquinas habilitadas</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php
    $result_usuarios = "SELECT * FROM operadores";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "<tr>";
        echo "<td>" . $row_usuario['matricula'] . "</td>";
        echo "<td>" . $row_usuario['nome'] . "</td>";
        echo "<td>" . $row_usuario['tipoDeOperador'] . "</td>";
        echo "<td>" . $row_usuario['maquinas'] . "</td>";
        echo "<td>
                <a href='perfilOperador.php?id=" . $row_usuario['id'] . "'>Detalhes</a>
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
          $('#navbar').load("src/navbar.html");
      });
  </script>
  
  
  </body>
</html>