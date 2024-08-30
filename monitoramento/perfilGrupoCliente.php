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

  <?php
    include_once("../banco.php");


    // Obtém o ID do usuário da URL
    $id = $_GET['id'];
    $nome_grupo = $_GET['nome'];

    ?>
    
    <div id="navbar"></div>

    <div class="cabecalho container">
      <div class="esquerda">
        <h1><?php echo $nome_grupo?></h1>
      </div>

      <div class="direita">
          <button type="button" class="btn btn-primary botao"><i class="bi bi-funnel"></i>  Filtros</button>
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
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>

              <?php
    // Consulta para buscar os clientes pertencentes ao grupo
 $query = "SELECT * FROM clientes WHERE grupos = '" . mysqli_real_escape_string($conn, $nome_grupo) . "'";
 $resultado_clientes = mysqli_query($conn, $query);

 while($row_cliente = mysqli_fetch_assoc($resultado_clientes)){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row_cliente['matricula']) . "</td>";
        echo "<td>" . htmlspecialchars($row_cliente['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row_cliente['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row_cliente['telefone']) . "</td>";
        echo "<td>" . htmlspecialchars($row_cliente['endereco']) . "</td>";
        echo "<td>
                <a href='perfilCliente.php?id=" . $row_cliente['id'] . "'class=btn btn-warning'>Detalhes</a>
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