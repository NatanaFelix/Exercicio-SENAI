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

	<title>Pesquisa Produtos</title>
    
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
	} else{
		// se não tiver, coloca '' (nada/null) na variavel $pesquisa
		$pesquisa = '';
	}

	// monta a query (o select no banco de dados fornecedores, procurando no campo nome, na tabela, que tenha a informação da variavel $pesquisa)
	$sql = "select * from produtos where descricao like '%$pesquisa%' or codigo_de_barras = '$pesquisa'";

	// executa a query e coloca o resultado em $dados
	$dados = mysqli_query($conexao,$sql);

?>
	<br><br>
	<h1><p align="center">Consulta de Produtos</p></h1>
	<nav class="navbar navbar-light bg-light">
	<div class="container-fluid">
		<form class="d-flex" action="pesquisa-produtos.php" method="POST">
		<input class="form-control me-2" type="search" placeholder="informe descrição ou barras" aria-label="Search" name="busca" >
		<button class="btn btn-outline-success" type="submit">Pesquisar</button>
		</form>
	</div>
	</nav>
	<table class="table table-hover">
	<thead>
		<tr>
		<th scope="col">Codigo</th>
		<th scope="col">Descrição</th>
		<th scope="col">Fornecedor</th>
		<th scope="col">Preço de Custo</th>
		<th scope="col">Preço de Venda</th>
		<th scope="col">Saldo em Estoque</th>
		</tr>
	</thead>

  <tbody>
  	<?php 
  	while ($linha = mysqli_fetch_assoc($dados)) {

  		$codigo_de_barras = $linha['codigo_de_barras'];
  		$descricao = $linha['descricao'];
  		$fornecedor = $linha['fornecedor'];
  		$custoproduto = formatavalor($linha['custoproduto']);
  		$vendaproduto = formatavalor($linha['vendaproduto']);
  		$quantidade = formatavalor($linha['quantidade']);
  		
	    echo "<tr>";
	    echo "<th scope='row'>$codigo_de_barras</th>";
	    echo "<td>$descricao</td>";
	    echo "<td>$fornecedor</td>";
	    echo "<td>$custoproduto</td>";
	    echo "<td>$vendaproduto</td>";
	    echo "<td>R$ $quantidade</td>";
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