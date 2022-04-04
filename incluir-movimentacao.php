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

	<title>Produtos</title>
    
</head>
<body>	
    <div class="container">
		<div class="row">
            <?php
                // faz a conexao com o banco de dados
                include_once 'conexao.php';
                include_once 'funcoes.php';
                // recuperar os dados do formulario fornecedores.php
                $chave = $_POST['mov_barras'];

                $mov_barras = $chave;
                $mov_cnpj = $_POST['mov_cnpj'];
                $mov_custo = $_POST['mov_custo'];
                $mov_venda = $_POST['mov_venda'];
                $mov_quantidade = $_POST['mov_quantidade'];
                $mov_datahora = $_POST['mov_datahora'];
                $quantidade = $_POST['quantidade'];
                $vendaproduto = $_POST['vendaproduto'];
                $custoproduto = $_POST['custoproduto'];

                // testa para ver se existe o CNPJ escolhido
                $sql = "INSERT INTO `movimentacao`(`mov_barras`, `mov_cnpj`, `mov_custo`, `mov_venda`, `mov_quantidade`, `mov_datahora`) 
                VALUES ('$mov_barras','$mov_cnpj','$mov_custo','$mov_venda','$mov_quantidade','$mov_datahora')";

                // executa a conexao e a pesquisa pela chave ($chave)
                if (mysqli_query($conexao,$sql) ) {                    
                    $quantidadeatual = $quantidade + $mov_quantidade;

                    if(floatval($mov_custo) == 0){$mov_custo = $custoproduto;}
                    if(floatval($mov_venda) == 0){$mov_venda = $vendaproduto;}

                    $sql = "UPDATE produtos SET quantidade = '$quantidadeatual', custo = '$mov_custo', venda = '$mov_venda' 
                    WHERE codigo_de_barras = '$chave'";

                    if(mysqli_query($conexao, $sql)){
                        echo "movimentação feita";
                    }else{
                        echo "<br><br>deu errado" . $sql;
                    }
                }else{
                    echo "<br>deu errado" . $sql;
                }
                ?>
        <a href="mostrar-movimentacao.php" class="button">Voltar</a>
    </div>
</div>
</body>
</html>