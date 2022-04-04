<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/Produtos.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

	<title>Incluir Produtos</title>
    
</head>
<body>	
	<div class="container">
		<div class="row">
        <?php
            include_once 'Conexao.php';
            $chave = $_POST ['codigo_de_barras'];
            $descricao = $_POST ['descricao'];
            $unidade = $_POST ['unidade'];
            $pesoproduto =$_POST ['pesoproduto'];
            $custoproduto = $_POST ['custoproduto'];
            $vendaproduto = $_POST ['vendaproduto'];
            $ultima_venda = $_POST ['ultima_venda'];
            $fornecedor = $_POST ['fornecedor'];
            $quantidade = $_POST ['quantidade'];
            $minimo = $_POST ['minimo'];
            $imagem = $_POST ['imagem'];

			$sql = "SELECT * FROM produtos WHERE codigo_de_barras = '$chave'";
			if ($resultado = mysqli_query($conexao, $sql)){
				if($campo = mysqli_fetch_array($resultado)){
					$sql = "UPDATE produtos SET codigo_de_barras = '$chave', descricao = '$descricao', unidade = '$unidade', pesoproduto = '$pesoproduto', custoproduto = '$custoproduto', 
					vendaproduto = '$vendaproduto', ultima_venda = '$ultima_venda', fornecedor = '$fornecedor', quantidade = '$quantidade', minimo = '$minimo', imagem = '$imagem'
					WHERE codigo_de_barras = '$chave'";
					if (mysqli_query($conexao, $sql)){
						echo "<br> Produto Cadastrado com sucesso";
					}else{
						echo "deu errado <br>";
						echo "<br>" . $conexao->error;
						echo "<br>" . $sql; 
						}
				}else{
					$sql = "INSERT INTO `produtos`(`codigo_de_barras`, `descricao`, `unidade`, `pesoproduto`, `custoproduto`, `vendaproduto`, `ultima_venda`, `fornecedor`, `quantidade`, `minimo`, `imagem`) 
					VALUES ('$chave','$descricao','$unidade','$pesoproduto','$custoproduto','$vendaproduto','$ultima_venda','$fornecedor','$quantidade','$minimo','$imagem')";
						if (mysqli_query($conexao, $sql)){
						echo 'Cadastro realizado com sucesso!';
						}else{
						echo 'não foi =(';
						echo $conexao->error . '<br>' .$sql;
						}	
					}				
			} else{					 
					 echo "<br> Não foi possivel executar <br>";
					 echo "<br>" . $conexao->error;
					 echo "<br>" . $sql;
					}
		
		$conexao->close();			          
	    ?>
        <a href="Produtos.php" class="btn btn-primaty" width=50%;>Voltar</a>
		</div>
	</div>
	<?php
	include_once 'Rodape.php';
	include_once 'bootjs.php';
	?>	
</body>
</html>