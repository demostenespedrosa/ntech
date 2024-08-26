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
</head>
  <body>
    <div id="navbar"></div>
    <div class="cards row justify-content-center">
      <div class="cards  row justify-content-center col-2"  style="margin-top: 50px;">
      <a href="cadastroMaquinas.php" style="text-decoration: none; cursor: pointer;">
      <div class="cards">
        <div class="alert alert-primary" role="alert" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
          <p style="font-size: 14px;">TOTAL DE EQUIPAMENTOS</p>
          <H1><strong>158</strong></H1>
        </div>
      </div>
    </a>
  </div>

      <div class="cards row justify-content-center col-2" style="margin-top: 50px;">
        <div class="alert alert-primary" role="alert" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
          <p style="font-size: 14px;">OPERADORES INATIVOS OU PAUSADOS</p>
          <H1><strong>15</strong></H1>
        </div>
      </div>
      <div class="cards row justify-content-center col-2" style="margin-top: 50px;">
        <div class="alert alert-primary" role="alert" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
          <p style="font-size: 14px;">EQUIPAMENTOS NÃO INICIADOS</p>
          <H1><strong>20</strong></H1>
        </div>
      </div>
      <div class="cards row justify-content-center col-2" style="margin-top: 50px;">
        <div class="alert alert-primary" role="alert" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
          <p style="font-size: 14px;">OPERADORES ATIVOS AGORA</p>
          <H1><strong>113</strong></H1>
        </div>
      </div>
      <div class="cards row justify-content-center col-2" style="margin-top: 50px;">
        <div class="alert alert-primary" role="alert" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
          <p style="font-size: 14px;">EQUIPAMENTOS EM MANUTENÇÃO</p>
          <H1><strong>10</strong></H1>
        </div>
      </div>
    </div>

    <div class="map row justify-content-center">
      <div class="card col-10">
        <div class="card-body">
          <img src="../assets/images/maps.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="container">

    <div class="ranking row" style="margin-top: 20px; justify-content: space-around; margin-bottom: 50px;">
      <div class="card col-5">
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
      <div class="card col-5">
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
      // Função de inicialização do mapa
      function initMap() {
          // Localização inicial
          const location = { lat: -23.1179457, lng: -46.9897974 };

          // Criar o mapa na div #map
          const map = new google.maps.Map(document.getElementById('map'), {
              zoom: 17,
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