<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="./css/Relatorio.css">

  <?php 
  include_once 'bootmeta.php';
  ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

  <title>relatorio</title>
</head>
<body>
  <?php 

  include_once 'conexao.php';
  include_once 'navbar.php';
  include_once 'funcoes.php';

  // $pesquisa = $_POST['busca'] ?? '';
  if (isset($_POST['busca'])) {
    echo "busca <br>";
    $pesquisa = $_POST['busca'];
    echo $pesquisa . "<br>";
  }
  else
  {
    echo "saiu no else <br>";
    $pesquisa ='';
  }

  echo "<br><br><br><br><br>";

  $sql = "select * from clientes where nome like '%$pesquisa%'";

  $dados = mysqli_query($conexao,$sql);

  if (!$dados) {
    echo "Erro na consulta" . $sql . "<br>"; 
  }
  
  ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php 
        //<form class="form-inline" action="relatorio.php" method="POST">
        //  <input class="form-control" type="search" name="busca">    
        //  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        //</form>
        ?>
        <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
            <form class="d-flex" action="relatorio.php" method="POST">
              <input class="form-control me-2" name="busca" type="search" placeholder="Pesquisar" aria-label="Search" autofocus>
              <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
          </div>
        </nav>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">CPF</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Nascimento</th>
              <th scope="col">Comando</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          while ($linha = mysqli_fetch_assoc($dados)) {
          //  foreach ($linha as $key => $value) {
          //    echo "$key: $value <br>";
          //  }
          //  echo "<hr>";  
          $cpf = $linha['cpf'];
          $nome = $linha['nome'];
          $email = $linha['email'];
          $nascimento = mostradata($linha['nascimento']);        
          echo "<tr>
                  <th scope='row'>$cpf</th>
                    <td>$nome</td>
                    <td>$email</td>
                    <td>$nascimento</td>
                    <td width=150px>
                      <a href='#' class='btn btn-success btn-sm'>Editar</a>
                      <a href='#' class='btn btn-danger btn-sm'>Apagar</a>
                    </td>
                  </th>
              </tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php 
  include_once 'Rodape.php';
  include_once 'bootjs.php';
  ?>

</body>
</html>