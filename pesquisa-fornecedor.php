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

	<title>Pesquisa Fornecedor</title>
    
</head>
<body>

<?php 
	include_once 'funcoes.php';
	include_once 'conexao.php';
	include_once 'navbar.php';

	echo $conexao->error;

	// testa se este formulario tem algo no campo input da pesquisa (name input = busca)
	if (isset($_POST['busca'])) {
		// se tiver algo no campo busca, coloca na variavel $pesquisa
		$pesquisa = $_POST['busca'];
	} else{
		// se não tiver, coloca '' (nada/null) na variavel $pesquisa
		$pesquisa = '';
	}

	// monta a query (o select no banco de dados fornecedores, procurando no campo nome, na tabela, que tenha a informação da variavel $pesquisa)
	$sql = "select * from fornecedores where razaosocial like '%$pesquisa%' or cnpj = '$pesquisa'";

	// executa a query e coloca o resultado em $dados
	$dados = mysqli_query($conexao,$sql);

?>
	<br><br>
	<h1><p align="center">Consulta de Fornecedores</p></h1>
	<nav class="navbar navbar-light bg-light">
	<div class="container-fluid">
		<form class="d-flex" action="pesquisa-fornecedor.php" method="POST">
		<input class="form-control me-2" type="search" placeholder="informe razao ou cnpj" aria-label="Search" name="busca" >
		<button class="btn btn-outline-success" type="submit">Pesquisar</button>
		</form>
	</div>
	</nav>
	<table class="table table-hover">
	<thead>
		<tr>
		<th scope="col">cnpj</th>
		<th scope="col">Razão social</th>
		<th scope="col">Telefone</th>
		<th scope="col">email</th>
		<th scope="col">Nascimento</th>
		<th scope="col">Salário</th>
		</tr>
	</thead>

  <tbody>
  	<?php 
  	while ($linha = mysqli_fetch_assoc($dados)) {

  		$cnpj = $linha['cnpj'];
  		$razaosocial = $linha['razaosocial'];
  		$telefone1 = $linha['telefone1'];
  		$email = $linha['email'];
  		$datadocadastro = formatadata($linha['datadocadastro']);
  		$ultimavenda = formatadata($linha['ultimavenda']);
		$saldocompras = formatavalor($linha['saldocompras']);
  		
	    echo "<tr>";
	    echo "<th scope='row'>$cnpj</th>";
	    echo "<td>$razaosocial</td>";
	    echo "<td>$telefone1</td>";
	    echo "<td>$email</td>";
	    echo "<td>$datadocadastro</td>";
	    echo "<td>R$ $ultimavenda</td>";
	    echo "<td>R$ $saldocompras</td>";
	    echo "</tr>";
	}
    ?>
  </tbody>
</table>
<?php 
include_once 'rodape.php';
include_once 'bootjs.php';
?>	
</body>
</html>