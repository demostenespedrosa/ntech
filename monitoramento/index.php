<?php
session_start();
include('../banco.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>N-Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/monitoramento.css">
    <link rel="stylesheet" href="css/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="shortcut icon" href="../assets/images/logo-fav.ico" />
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <style type="text/css">
    	.card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #8C2C60, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

</style>
</head>
  <body>
    <div id="navbar"></div>
<div class="container">
  <div class="row justify-content-around" style="margin-top: 50px; margin-bottom: 10px; display: " >
    <div class="l-bg-orange card" style="border-radius: 5px; padding: 10px; width: 23%;">
      <h5>TOTAL DE EQUIPAMENTOS</h5>
      <h1>123</h1>
    </div>

    <div class="l-bg-green card" style="border-radius: 5px; padding: 10px; width: 23%;">
      <h5>OPERADORES ATIVOS AGORA</h5>
      <h1>23</h1>
    </div>

    <div class="l-bg-cyan card" style="border-radius: 5px; padding: 10px; width: 23%;">
      <h5>EQUIPAMENTOS EM MANUTENÇÃO</h5>
      <h1>20</h1>
    </div>

    <div class="l-bg-cherry card" style="border-radius: 5px; padding: 10px; width: 23%;">
      <h5>EQUIPAMENTOS ATIVOS</h5>
      <h1>22</h1>
    </div>
  </div>
  </div>

<div class="container card">
  <div class="card-body" onload="initMap()">
    <h3 style="margin-top: 10px; margin-bottom: 20px; color: #aaa;">Localização em tempo real</h3>
  <div id="map" style="widht: 100%; height: 500px; border-radius: 10px;"></div>
  </dif>
</div>
</div>



   

    <div class="container card">

    <div class="ranking row container" style="margin-top: 20px; justify-content: space-between; margin-bottom: 50px;">
    <div class="center" style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
    <h3 style="margin-top: 10px; margin-bottom: 20px; color: #aaa;">Ranking em tempo real</h3>
    </div>
    <div class="card col-5" style="margin-left: 20px;">
        <div class="card-body">
          <h5><i class="bi bi-award"></i>  Ranking de operadores</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Operador</th>
                <th scope="col">Horas de atividade</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>João</td>
                <td>36</td>
                <td><i class="bi bi-award-fill" style="color: darkgoldenrod;"></i></td>
              </tr>
              <tr>
                <td>Daniel</td>
                <td>32</td>
                <td><i class="bi bi-award-fill" style="color:cadetblue;"></i></td>
              </tr>
              <tr>
                <td>Francisco</td>
                <td>28</td>
                <td><i class="bi bi-award-fill" style="color:chocolate;"></i></td>
              </tr>
              <tr>
                <td>José</td>
                <td>26</td>
                <td></td>
              </tr>
              <tr>
                <td>Antônio</td>
                <td>22</td>
                <td></td>
              </tr>
              <tr>
                <td>Geraldo</td>
                <td>20</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card col-5" style="margin-right: 20px;">
        <div class="card-body">
          <h5><i class="bi bi-award"></i>  Ranking de equipamentos</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Máquina</th>
                <th scope="col">Horas de atividade</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Empilhadeira</td>
                <td>36</td>
                <td><i class="bi bi-award-fill" style="color: darkgoldenrod;"></i></td>
              </tr>
              <tr>
                <td>Paleteira</td>
                <td>32</td>
                <td><i class="bi bi-award-fill" style="color:cadetblue;"></i></td>
              </tr>
              <tr>
                <td>Empilhadeira G2</td>
                <td>28</td>
                <td><i class="bi bi-award-fill" style="color:chocolate;"></i></td>
              </tr>
              <tr>
                <td>Paleteira G2</td>
                <td>26</td>
                <td></td>
              </tr>
              <tr>
                <td>Empilhadeira G3</td>
                <td>22</td>
                <td></td>
              </tr>
              <tr>
                <td>Paleteira G3</td>
                <td>20</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

          
  </div>

  
   
    

   






    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA4VwZ_qmxw4oaaGIKcjjw96TapvECfXU&callback=initMap"></script>
    <script>
    $(function(){
            $('#navbar').load("src/navbar.php");
        });
    </script>
 <script>
    var map;
    var markers = {};

    // Função para inicializar o mapa
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: {lat: -8.0539, lng: -34.8811}, // Centraliza no ponto desejado
            mapTypeControl: false, // Remove os botões de Mapa/Satélite
            streetViewControl: false, // Remove o botão do Street View
            fullscreenControl: false, // Remove o botão de Tela Cheia
            zoomControl: false // Remove os botões de Zoom
        });

        // Atualiza a localização das máquinas a cada 10 segundos
        setInterval(fetchLocations, 10000);

        // Chama a função de busca inicial
        fetchLocations();
    }

    // Função para buscar as localizações das máquinas
    function fetchLocations() {
        fetch('obter_localizacoes.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(function(machine) {
                    var machineId = machine.id;
                    var position = {lat: parseFloat(machine.latitude), lng: parseFloat(machine.longitude)};

                    // Verifica se o marcador já existe
                    if (markers[machineId]) {
                        markers[machineId].setPosition(position);
                    } else {
                        // Cria um novo marcador
                        markers[machineId] = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: 'Máquina ID: ' + machineId
                        });
                    }
                });
            })
            .catch(error => console.log('Erro ao buscar localizações:', error));
    }
</script>



  </body>
</html>