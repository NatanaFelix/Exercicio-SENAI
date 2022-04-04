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

	<title>Mostrar Produtos</title>
    
</head>
<body>

	<?php
		include_once 'navbar.php';
		include_once 'Conexao.php';        
	
		$chave = $_POST['codigo_de_barras'];
        $sql = "SELECT * FROM produtos WHERE codigo_de_barras = '$chave'";
        $resultado = mysqli_query($conexao, $sql);
        $campo = mysqli_fetch_array($resultado);
        $descricao = $campo['descricao'] ?? '';
        $unidade = $campo['unidade'] ?? '';
        $pesoproduto = $campo['pesoproduto'] ?? '';
        $custoproduto = $campo['custoproduto'] ?? '';
        $vendaproduto = $campo ['vendaproduto'] ?? '';
        $ultima_venda = $campo['ultima_venda'] ?? '';
        $fornecedor = $campo['fornecedor'] ?? '';
        $quantidade = $campo['quantidade'] ?? '';
        $minimo = $campo['minimo'] ?? '';
        $imagem = $campo['imagem'] ?? '';
        
	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="incluir-produto.php" method="POST">
					<fieldset style="background-color: grey;  ">
						CADASTRO DE PRODUTOS
					</fieldset>
					<fieldset style="background-color: lightgrey;">
						<table>
							<tr>
								<td>Código de Barras</td>
								<td><input disabled type="number" name="codigo_de_barras" size="13" maxlength="13" value="<?php echo $chave; ?>">  
									<input type='hidden' name="codigo_de_barras" value="<?php echo $chave; ?>">
								</td>
								<td>Descrição</td>
								<td><input type="text" name="descricao" size="50" maxlength="50" value="<?php echo $descricao; ?>"></td>
							</tr>
							<tr>
								<td>Unidade</td>
									<td>
										<select name="unidade" value="<?php echo $unidade; ?>">
											<option value=""></option>
											<option value="Lata">Lata</option>
											<option value="Kilograma">Kilograma</option>
											<option value="Peça">Peça</option>
											<option value="Metro">Metro</option>
											<option value="Unidade">Unidade</option>
										</select>
									</td>
								<td>Peso</td>
								<td><input type="number" name="pesoproduto" size="5" maxlength="5" value="<?php echo $pesoproduto; ?>"></td>
							</tr>
							<tr>
								<td>Custo</td>
								<td><input type="number" name="custoproduto" size="10" maxlength="10" value="<?php echo $custoproduto; ?>"></td>
								<td>Venda</td>
								<td><input type="number" name="vendaproduto" size="10" maxlength="10" value="<?php echo $vendaproduto; ?>"></td>
							</tr>
							<tr>
								<td>Última Compra</td>
								<td><input type="date" name="ultima_venda" value="<?php echo $ultima_venda; ?>"></td>
								<td>Fornecedor</td>
								<td><input type="number" name="fornecedor" size="5" maxlength="5" value="<?php echo $fornecedor; ?>"></td>
							</tr>
							<tr>
								<td>quantidade</td>
								<td><input type="number" name="quantidade" size="5" maxlength="5" value="<?php echo $quantidade; ?>"></td>
								<td>Mínimo</td>
								<td><input type="number" name="minimo" size="5" maxlength="5" value="<?php echo $minimo; ?>"></td>
							</tr>
							<tr>
								<td>Imagem</td>
								<td><input type="file" name="imagem" value="<?php echo $imagem; ?>"></td>
							</tr> 
						</table>
						<br>
						<input type="submit" name="botaoenviar" value="Gravar">
                        <a href="clientes.php" class="btn btn-primaty" width=50%;>Voltar</a>
						<br>
						<br>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<?php
  	include_once 'Rodape.php';
	include_once 'bootjs.php';
  	?>
		
</body>
</html>