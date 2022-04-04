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

	<title>Produtos</title>
    
</head>
<body>

	<?php
		include_once 'navbar.php';
		include_once 'Conexao.php';
	
	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="mostrar-produtos.php" method="POST">
					<fieldset style="background-color: grey;  ">
						CADASTRO DE PRODUTOS
					</fieldset>
					<fieldset style="background-color: lightgrey;">
						<table>
							<tr>
								<td>Código</td>
								<td><input  type="number" name="codigo_de_barras" size="13" maxlength="13" required>  
									<button>Buscar</button>
								</td>
								<td>Descrição</td>
								<td><input disabled type="text" name="descrocao" size="50" maxlength="50"></td>
							</tr>
							<tr>
								<td>Unidade</td>
									<td>
										<select disabled name="unidade">
											<option value=""></option>
											<option value="Lata">Lata</option>
											<option value="Kilograma">Kilograma</option>
											<option value="Peça">Peça</option>
											<option value="Metro">Metro</option>
											<option value="Unidade">Unidade</option>
										</select>
									</td>
								<td>Peso</td>
								<td><input disabled type="number" name="pesoproduto" size="5" maxlength="5"></td>
							</tr>
							<tr>
								<td>Custo</td>
								<td><input disabled type="number" name="custoproduto" size="10" maxlength="10"></td>
								<td>Venda</td>
								<td><input disabled type="number" name="vendaproduto" size="10" maxlength="10"></td>
							</tr>
							<tr>
								<td>Última Compra</td>
								<td><input disabled type="date" name="ultima_venda"></td>
								<td>Fornecedor</td>
								<td><input disabled type="number" name="fornecedor" size="5" maxlength="5"></td>
							</tr>
							<tr>
								<td>quantidade</td>
								<td><input disabled type="number" name="quantidade" size="5" maxlength="5"></td>
								<td>Mínimo</td>
								<td><input disabled type="number" name="minimo" size="5" maxlength="5"></td>
							</tr>
							<tr>
								<td>Imagem</td>
								<td><input disabled type="file" name="imagem"></td>
								<img src="" alt="">
							</tr>  
						</table>
						<br>
						<input disabled type="submit" name="botaoenviar" value="Gravar">
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