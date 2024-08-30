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
   <style>
    /* Estilo para a div que vai conter o mapa */
    #map {
        height: 30vh; /* Altura total da tela */
        width: 100%;    /* Largura total da tela */
    }
    </style>
</head>
  <body>

    <?php
    include_once("../banco.php");

    // Obtém o ID do usuário da URL
    $id = $_GET['id'];

    // Busca as informações do usuário
    $result_usuario = "SELECT * FROM clientes WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    ?>

    <div id="navbar"></div>

    <div class="cabecalho container">
      <div class="esquerda">
        <h1>Detalhes do cliente</h1>
      </div>

      <div class="direita">
          <button type="button" class="btn btn-warning botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i>  Editar cliente</button>
          <button type="button" class="btn btn-danger botao"><i class="bi bi-trash3"></i>  Excluir Cliente</button>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Colaborador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="mb-3">
              <label for="formFile" class="form-label">Logo da empresa</label>
              <input class="form-control" type="file" id="formFile">
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
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Salvar Colaborador</button>
      </div>
    </div>
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
                    <img src="../assets/images/magalu.png" class="img-fluid rounded-circle" alt="">
                  </div>
                  <h5 class="text-center mb-1"><?php echo $row_usuario['nome']; ?></h5>
                  <p class="text-center text-secondary mb-4"><?php echo $row_usuario['CPFouCNPJ']; ?></p>
                  <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <h6 class="m-0">matricula</h6>
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
              <div class="card widget-card border-light shadow-sm" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="card-header text-bg-primary"></div>
                <div class="card-body">
                  <h5>Endereço</h5>
                  <span style="margin-bottom: 10px;"><?php echo $row_usuario['endereco']; ?></span>
                  <div id="map" style="border-radius: 20px; border: 1px solid #6A889B;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-9">
          <div class="card widget-card border-light shadow-sm">
            <div class="card-body p-4">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Perfil</button>
                </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Equipamentos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Operadores</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="tab-content pt-4" id="profileTabContent">
                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                  <div class="row g-0">
                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                      <div class="p-2">Razão social</div>
                    </div>
                    <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                      <div class="p-2"><?php echo $row_usuario['razao']; ?></div>
                    </div>
                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                      <div class="p-2">Colaborador responsável</div>
                    </div>
                    <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                      <div class="p-2"><?php echo $row_usuario['responsavel']; ?></div>
                    </div>
                    <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                      <div class="p-2">Contato do responsável</div>
                    </div>
                    <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                      <div class="p-2"><?php echo $row_usuario['telefoneResponsavel']; ?></div>
                    </div>
                  </div>
                </div>
              </div></div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><div class="card" style="margin-top: 20px;">
                      <div class="card-body">
                        <h5>Equipamentos</h5>
                        <div class="conteudo">
                        <table class="table" border="1">
                            <tr>
                                <th>Matricula</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            <?php
                            $result_usuarios = "SELECT * FROM maquinas";
                            $resultado_usuarios = mysqli_query($conn, $result_usuarios);

                            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                                echo "<tr>";
                                echo "<td>" . $row_usuario['matricula'] . "</td>";
                                echo "<td>" . $row_usuario['nome'] . "</td>";
                                echo "<td>" . $row_usuario['status'] . "</td>";
                                echo "<td>
                                        <a href='perfilMaquina.php?id=" . $row_usuario['id'] . "'class=btn btn-warning'>Detalhes</a>
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        </div>
                        </div>
                        
                      </div>
                    </div></div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><div class="card" style="margin-top: 20px;">
                      <div class="card-body">
                        <div class="box container" style="display: flex; justify-content: space-between;">
                        <div class="esquerda">
                        <h5>Operadores</h5>
                        </div>
                        <div class="direita">
                          <a href="listaEquipamentos.html" class="btn btn-secondary">Ver todos</a>
                        </div>
                        </div>
                        
                      </div>
                    </div></div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4VwZ_qmxw4oaaGIKcjjw96TapvECfXU&callback=initMap"></script>
    <script>
      $(function(){
          $('#navbar').load("src/navbar.php");
      });
    </script>
    <script>
      // Função de inicialização do mapa
      function initMap() {
          // Localização inicial (por exemplo, São Paulo)
          const location = { lat: -23.1179457, lng: -46.9897974 };

          // Criar o mapa na div #map
          const map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: location
          });

          // Marcador no mapa
          const marker = new google.maps.Marker({
              position: location,
              map: map
          });
      }
  </script>
</body>
</html>