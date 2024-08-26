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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../monitoramento/css/monitoramento.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/logo-fav.ico" />
    <link rel="stylesheet" href="../monitoramento/css/cadastroMaquinas.css">
</head>
<body>
    <div id="navbar"></div>

    <div class="cabecalho container" style="margin-top: 100px;">
        <div class="cabecalho1">
            <h1>Gerenciar Máquinas</h1>
        </div>
        <div class="cabecalho2">
            <button class="btn btn-primary"><i class="bi bi-funnel"></i> Filtros</button>
            <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-lg"></i>  Adicionar máquina</button>
        </div>
    </div>

           <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar máquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Marca:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Exemplo: Toyota">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Modelo:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Exemplo: Empilhadeira retrátil">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Referencia da máquina:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Exemplo: PR-90i">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Matrícula:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Exemplo: 352102024">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cliente:</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Selecione o cliente</option>
              <option value="1">Cliente 1</option>
              <option value="2">Cliente 2</option>
              <option value="3">Cliente 3</option>
            </select>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><i class="bi bi-plus-lg"></i>  Adicionar máquina</button>
      </div>
    </div>
  </div>
</div>

        <div class="card container" style="margin-top: 20px;">
            <div class="card-body">
                <div class="pesquisa">
                    <div class="barra"></div>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquise aqui...">
                    <button class="btn btn-outline-primary" type="button"><i class="bi bi-search"></i></button>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Matricula</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Modelo</th>
                          <th scope="col">cliente</th>
                          <th scope="col">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
    $result_usuarios = "SELECT * FROM maquinas";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "<tr>";
        echo "<td>" . $row_usuario['matricula'] . "</td>";
        echo "<td>" . $row_usuario['nome'] . "</td>";
        echo "<td>" . $row_usuario['modelo'] . "</td>";
        echo "<td>" . $row_usuario['cliente'] . "</td>";
        echo "<td>
                <a href='perfilMaquina.php?id=" . $row_usuario['id'] . "'>Detalhes</a>
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









    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(function(){
                $('#navbar').load("src/navbar.php");
            });
        </script>
      </body>
    </html>