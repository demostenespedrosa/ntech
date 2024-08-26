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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>
  <body>

  <?php
    include_once("../banco.php");

    // Obtém o ID do usuário da URL
    $id = $_GET['id'];

    // Busca as informações do usuário
    $result_usuario = "SELECT * FROM operadores WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    ?>

    <div id="navbar"></div>
    <div class="cabecalho container">
      <div class="esquerda">
        <h1>Detalhes do operador</h1>
      </div>
      <div class="direita">
      <button type="button" class="btn btn-warning botao" data-bs-toggle="modal" data-bs-target="#ModalBloqueio"><i class="bi bi-lock-fill"></i>  Bloquear</button>
          <button type="button" class="btn btn-success botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i>  Editar operador</button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#Modal2" class="btn btn-danger botao"><i class="bi bi-trash3"></i>  Excluir operador</button>
        </div>

<!-- Modal -->
<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir operador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Realmente deseja excluir esse operador?</h5>
        <form action="deletarOperador.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row_usuario['id']); ?>">
      </div>
      <div class="modal-footer">
      <input type="submit" value="Excluir">
        </form>
      </div>
    </div>
  </div>
</div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Operador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="editarOperador.php" method="post">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">   
          <div class="mb-3" style="margin-top: 10px;">
              <label for="formFile" class="form-label">Foto de perfil</label>
              <input class="form-control" name="fotoPerfil" type="file" id="formFile">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nome completo</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="nome" value="<?php echo $row_usuario['nome']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Usuario</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="usuario" value="<?php echo $row_usuario['usuario']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Matrícula</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="matricula" value="<?php echo $row_usuario['matricula']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Tipo de operador</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="tipoDeOperador" value="<?php echo $row_usuario['tipoDeOperador']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">E-mail</label>
              <input type="email" class="form-control" required id="exampleFormControlInput1" name="email" value="<?php echo $row_usuario['email']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Telefone</label>
              <input type="tel" class="form-control" required id="exampleFormControlInput1" name="telefone" value="<?php echo $row_usuario['telefone']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CPF</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="cpf" value="<?php echo $row_usuario['cpf']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Endereço</label>
              <input type="text" class="form-control"  id="exampleFormControlInput1" name="endereco" value="<?php echo $row_usuario['endereco']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Senha</label>
              <input type="text" class="form-control" required id="exampleFormControlInput1" name="senha" value="<?php echo $row_usuario['senha']; ?>">
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

<!-- Modal -->
<div class="modal fade" id="ModalBloqueio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Bloquear operador</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Realmente deseja bloquear esse operador?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning"><i class="bi bi-lock-fill"></i>  Bloquear operador</button>
                    </div>
                  </div>
                </div>
              </div>


    <div class="container" style="margin-top: 30px;">
    <div class="container">
      <div class="row gy-4 gy-lg-0">
        <div class="col-12 col-lg-4 col-xl-3">
          <div class="row gy-4">
            <div class="col-12">
              <div class="card widget-card border-light shadow-sm">
                <div class="card-header text-bg-primary"></div>
                <div class="card-body">
                  <div class="text-center mb-3">
                    <img src="../assets/images/operador.png" class="img-fluid rounded-circle" alt="">
                  </div>
                  <h5 class="text-center mb-1"><?php echo $row_usuario['nome']; ?></h5>
                  <p class="text-center text-secondary mb-4"><?php echo $row_usuario['tipoDeOperador']; ?></p>
                  <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <h6 class="m-0">Matrícula</h6>
                      <span><?php echo $row_usuario['matricula']; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <h6 class="m-0">Contato</h6>
                      <span><?php echo $row_usuario['telefone']; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <h6 class="m-0">E-mail</h6>
                      <span><?php echo $row_usuario['email']; ?></span>
                    </li>
                  </ul>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-9">
          <div class="card widget-card border-light shadow-sm">
            <div class="card-body p-4">
              <div class="container">
                <div class="row my-3">
                    <div class="col">
                        <h4>Indicadores de Atividade</h4>
                    </div>
                
                </div>
              <div class="alert alert-success col-12" role="alert" style="display: flex; justify-content: center; align-itens: center;">
              <p>Status do operador:  ATIVO</strong></p>
              </div>
              <hr class="container col-8">
                <div class="row my-2">
                    <div class="col-md-6 py-1">
                        <div class="card">
                            <div class="card-body">
                              <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-1">
                        <div class="card">
                            <div class="card-body">
                              <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chDonut1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chDonut2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chDonut3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
    <script>
      var xValues = ["Banheiro", "Almoço", "Falha na maquina"];
      var yValues = [55, 49, 44];
      var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797"
      ];
      
      new Chart("myChart", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          title: {
            display: true,
            text: "Motivos de parada"
          }
        }
      });
      </script>
      <script>
        var xValues = ["Tempo em atividade", "Tempo de parada ou inativo"];
        var yValues = [70, 30];
        var barColors = [
        "#DC9147",  
        "#076EFD"
          
        ];
        
        new Chart("myChart1", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Tempo ativo contra tempo inativo ou em pausa"
            }
          }
        });
        </script>
</body>
</html>