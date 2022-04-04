<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="./css/Produtos.css">

	<?php
	include_once 'bootmeta.php';
	?>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

	<title>Pesquisa Cliente</title>
    
</head>
<body>

<?php 
include_once 'funcoes.php';
include_once 'conexao.php';
include_once 'navbar.php';

// testa se este formulario tem algo no campo input da pesquisa (name input = busca)
if (isset($_POST['busca'])) {
	// se tiver algo no campo busca, coloca na variavel $pesquisa
	$pesquisa = $_POST['busca'];
}
else
{
	// se não tiver, coloca '' (nada/null) na variavel $pesquisa
	$pesquisa = '';
}

// monta a query (o select no banco de dados clientes, procurando no campo nome, na tabela, que tenha a informação da variavel $pesquisa)
$sql = "select * from clientes where nome like '%$pesquisa%' or cpf = '$pesquisa'";

// executa a query e coloca o resultado em $dados
$dados = mysqli_query($conexao,$sql);

?>
<br><br>
<h1><p align="center">Consulta de Clientes</p></h1>

<!-- // usa o navbar para colocar na tela um campo de pesquisa com o metodo POST e action para o mesmo formulário -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <form class="d-flex" action="pesquisa-cliente.php" method="POST">
      <input class="form-control me-2" type="search" placeholder="informe nome ou cpf" aria-label="Search" name="busca" >
      <button class="btn btn-outline-success" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

<!-- monta uma table hover -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">CPF</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Nascimento</th>
      <th scope="col">Salário</th>
    </tr>
  </thead>


  <tbody>
  	<?php 
  	// faz um loop com os dados (linhas) do banco de dados (uma a uma ate o fim)
  	while ($linha = mysqli_fetch_assoc($dados)) {

  		// pega os valores de cada linha e coloca em variaveis
  		$cpf = $linha['cpf'];
  		$nome = $linha['nome'];
  		$celular = $linha['celular'];
  		$email = $linha['email'];
  		$nascimento = formatadata($linha['nascimento']);
  		$salario = formatavalor($linha['salario']);
  		
  		// mostra o que colocou em variaveis
	    echo "<tr>";
	    echo "<th scope='row'>$cpf</th>";
	    echo "<td>$nome</td>";
	    echo "<td>$celular</td>";
	    echo "<td>$email</td>";
	    echo "<td>$nascimento</td>";
	    echo "<td>R$ $salario</td>";
	    echo "</tr>";
	}

    ?>
  </tbody>
</table>

<?php 
include_once 'rodape.php';

?>

	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
</body>
</html>