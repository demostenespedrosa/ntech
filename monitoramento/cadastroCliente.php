<?php
include_once("../banco.php");

// Diretório onde as imagens serão salvas
$diretorio = "uploads/";


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
        <h1>Gerenciar Clientes</h1>
      </div>

      <div class="direita">
          <button type="button" class="btn btn-success botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i>  Adicionar cliente</button>
          <button type="button" class="btn btn-primary botao"><i class="bi bi-funnel"></i>  Filtros</button>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="processa-cliente.php" method="post">
        <div class="mb-3">
            <label for="formFile" class="form-label">Logo da empresa</label>
            <input class="form-control" name="logo" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Matrícula</label>
            <input type="text" class="form-control" name="matricula" required id="exampleFormControlInput1" placeholder="123456">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required id="exampleFormControlInput1" placeholder="Exemplo: Minha Empresa">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Razão social</label>
            <input type="text" class="form-control" name="razao" id="exampleFormControlInput1" placeholder="Exemplo: Minha Empresa">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">CPF ou CNPJ</label>
            <input type="text" class="form-control" name="CPFouCNPJ" required id="exampleFormControlInput1" placeholder="Exemplo: 000.000.000/0001-00">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" required id="exampleFormControlInput1" placeholder="empresa@email.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Telefone</label>
            <input type="tel" class="form-control" name="telefone" required id="exampleFormControlInput1" placeholder="(00) 00000-0000">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Endereço</label>
            <input type="text" class="form-control" name="endereco" required id="exampleFormControlInput1" placeholder="Rua, Bairro, Cidade, Estado e CEP">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Colaborador responsável</label>
            <input type="text" class="form-control" name="responsavel" id="exampleFormControlInput1" placeholder="Exemplo: Fulano de Tal">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Telefone do Colaborador responsável</label>
            <input type="text" class="form-control" name="" id="exampleFormControlInput1" placeholder="(00) 00000-0000">
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Salvar clientes">
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
                <th scope="col">Matrícula</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php
    $result_usuarios = "SELECT * FROM clientes";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "<tr>";
        echo "<td>" . $row_usuario['matricula'] . "</td>";
        echo "<td>" . $row_usuario['nome'] . "</td>";
        echo "<td>" . $row_usuario['email'] . "</td>";
        echo "<td>" . $row_usuario['telefone'] . "</td>";
        echo "<td>" . $row_usuario['endereco'] . "</td>";
        echo "<td>
                <a href='perfilCliente.php?id=" . $row_usuario['id'] . "'>Detalhes</a>
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