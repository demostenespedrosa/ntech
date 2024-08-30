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
  <link rel="stylesheet" href="../../ntech/monitoramento/css/perfilMaquinas.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link rel="shortcut icon" href="../assets/images/logo-fav.ico" />
  <link rel="stylesheet" href="css/card.css">
  <style>
    /* Estilo para a div que vai conter o mapa */
    #map {
        height: 30vh; /* Altura total da tela */
        width: 100%;    /* Largura total da tela */
    }
</style>
<style>

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.caixa {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.caixa::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.dentrocaixa {
  padding: 10px 10px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
    </head>
  <body>

  <?php
    include_once("../banco.php");

    // Obtém o ID do usuário da URL
    $id = $_GET['id'];

    // Consulta para obter os detalhes da máquina
$sql = "SELECT * FROM maquinas WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row["nome"];
    $status = $row["status"];
    $novoStatus = $status == 'ativo' ? 'inativo' : 'ativo';

?>



    <div id="navbar"></div>

    <div class="cabecalho container">
      <div class="esquerda">
        <h1>Detalhes da máquina</h1>
      </div>

      <div class="direita">
      <form method="POST" action="alterar_status.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="status" value="<?php echo $novoStatus; ?>">
        <button type="submit" class="btn btn-warning botao" data-bs-toggle="modal" data-bs-target="#ModalBloqueio"><i class="bi bi-lock-fill"></i>  Tornar <?php echo ucfirst($novoStatus); ?></button>
    </form>
    <?php
} else {
    echo "Nenhuma máquina encontrada.";
}

$conn->close();
?>
          <button type="button" class="btn btn-success botao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i>  Editar máquina</button>
          <button type="button" class="btn btn-danger botao"  data-bs-toggle="modal" data-bs-target="#Modal2"><i class="bi bi-trash3"></i>  Excluir máquina</button>
        </div>

                <!-- Modal -->
<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir máquina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Realmente deseja excluir essa máquina?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Excluir máquina</button>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar máquina</h1>
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
        <button type="button" class="btn btn-success">Salvar máquina</button>
      </div>
    </div>
  </div>
</div>

               <!-- Modal -->
               <div class="modal fade" id="ModalBloqueio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Bloquear Máquina</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Realmente deseja bloquear essa máquina?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning"><i class="bi bi-lock-fill"></i>  Bloquear máquina</button>
                    </div>
                  </div>
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
                    <img src="../assets/images/pr17.jpg" class="img-fluid rounded-circle" alt="">
                  </div>
                  <h5 class="text-center mb-1"><?php echo $row['modelo']; ?></h5>
                  <p class="text-center text-secondary mb-4"><?php echo $row['nome']; ?></p>
                  <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <h6 class="m-0"><strong>Matrícula</strong></h6>
                      <span><?php echo $row['matricula']; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <h6 class="m-0"><strong>Cliente</strong></h6>
                      <span><?php echo $row['cliente']; ?></span>
                    </li>
                  </ul>
                  
                </div>
              </div>
              <div class="card widget-card border-light shadow-sm" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="card-header text-bg-primary"></div>
                <div class="card-body">
                  <h5>Localização</h5>
                  <div id="map" style="border-radius: 20px; border: 1px solid #6A889B;"></div>
                  
                </div>
                
              </div>
              
            
              

            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-9">
          <div class="card widget-card border-light shadow-sm">
            <div class="card-body">
              <h3 style="margin-top: 10px;" class="col-10">Relatórios em tempo real</h3>
              <div class="row justify-content-center" style="margin-top: 30px;">
              <div class="alert alert-success col-10" role="alert" style="display: flex; justify-content: center; align-itens: center;">
              <p>Status do dispositivo:  <strong><?php echo $row['status']; ?></strong></p>
              </div>
              <hr class="container col-8">
                <div class="card col-5" style="margin-right: 20px;">
                  <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                </div>
                <div class="card col-5">
                  <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                </div>
                <div class="titulo container row" style="margin-top: 40px; display: flex; justify-content: center; align-itens: center;">
                <div class="a col-10" style="display: flex; justify-content: space-between;">
                  <div class="esquerda">
                  <h3>Timeline</h3>
                  </div>
               <div class="direita">
               <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                  <label class="btn btn-outline-primary" for="btnradio1">Dia</label>

                  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                  <label class="btn btn-outline-primary" for="btnradio2">Semana</label>

                  <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                  <label class="btn btn-outline-primary" for="btnradio3">Mês</label>
                </div>
               </div>
                
                </div>
                
                </div>
                
                <div class="timeline card col-10" style="background-color: #474e5d; margin-top: 40px;">
                
                    <div class="card-board">                 
    <div class="caixa left">
    <div class="dentrocaixa">
      <p><strong>23/08/2024 12:24</strong></p>
      <p>Equipamento ligado por operador autorizado: <strong>João Antônio</strong></p>
    </div>
  </div>
  <div class="caixa right">
    <div class="dentrocaixa">
      <p><strong>23/08/2024 12:24</strong></p>
      <p>Equipamento pausado por operador autorizado: <strong>João Antônio</strong> por motivo: <strong>Banheiro</strong></p>
    </div>
  </div>
  <div class="caixa left">
    <div class="dentrocaixa">
      <p><strong>23/08/2024 12:24</strong></p>
      <p>Equipamento retomado por operador autorizado: <strong>João Antônio</strong></p>
    </div>
  </div>
  <div class="caixa right">
    <div class="dentrocaixa">
    <p><strong>23/08/2024 12:24</strong></p>
    <p>Equipamento finalizado por operador autorizado: <strong>João Antônio</strong> Motivo: <strong>Fim de expediente</strong></p>
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
          const location = { lat: -8.10705, lng: -34.9265685 };

          // Criar o mapa na div #map
          const map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: location
          });

          // Marcador no mapa
          const marker = new google.maps.Marker({
              position: location,
              map: map
          });
      }
  </script>


    <script>
      var xValues = ["Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"];
      var yValues = [12, 24, 14, 19, 10, 12, 16];
      var barColors = ["red", "green","blue","orange","brown", "black", "yellow"];
      
      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {display: false},
          title: {
            display: true,
            text: "Tempo de atividade (por dia)"
          }
        }
      });
      </script>

<script>
      var xValues = ["Manhã", "Tarde", "Noite"];
      var yValues = [15, 16, 15.2];
      var barColors = ["brown", "orange","pink"];
      
      new Chart("myChart1", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {display: false},
          title: {
            display: true,
            text: "Tempo de pausas (por turno)"
          }
        }
      });
      </script>
  










</body>
</html>