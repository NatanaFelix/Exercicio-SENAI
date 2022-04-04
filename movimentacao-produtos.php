<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" type="text/css" href="./css/movimentacao-produtos.css">
	
	<?php
	include_once 'bootmeta.php';
	?>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	
	<title>Clientes</title>
   
</head>
<body>
<?php
include_once 'conexao.php'; 
include_once 'navbar.php';
include_once 'funcoes.php';



?>
<br><br>
	<div class="container">
		<div class="row">
			<div class="col">
					<form action="mostrar-movimentacao.php" method="POST" > 
						<fieldset id="cabecalho1" style="align-items: center; background-color: grey;  ">
							MOVIMENTAÇÃO DE PRODUTOS
						</fieldset>
						<fieldset style="background-color: lightgrey;">
							<table>
								<tr>
									<td>Código de Barras</td>
									<td><input  type="number" name="mov_barras" size="13" maxlength="13" required> 
										<button>Buscar</button>
									</td>

									<td>Descrição</td>
										<td><input type="text" name="descricao" size="50" maxlength="50" disabled>
									</td>
								</tr>

								<tr>
									<td>Unidade</td>
									<td><select name="unidade" disabled >
											<option value=""></option>
											<option value="Lata">Lata</option>
											<option value="Kilograma">Kilograma</option>
											<option value="Peça">Peça</option>
											<option value="Metro">Metro</option>
											<option value="Unidade">Unidade</option>
										</select>
									</td>

									<td>Peso</td>
										<td><input type="number" name="pesoproduto" size="5" maxlength="5" disabled >
									</td>
								</tr>

								<tr>
									<td>Custo</td>
									<td><input type="number" name="custoproduto" size="10" maxlength="10" disabled></td>
									<td>Venda</td>
									<td><input type="number" name="vendaproduto" size="10" maxlength="10" disabled></td>
								</tr>

								<tr>
									<td>Em Estoque</td>
									<td><input type="number" name="quantidade" size="5" maxlength="5" disabled=""></td>
									<td>Estoque Mínimo</td>
									<td><input type="number" name="minimo" size="5" maxlength="5" disabled ></td>
								</tr>

								<tr>
									<td>Imagem</td>
									<td><input type="file" name="imagem" disabled></td>
								</tr>

								<tr>
									<td>Fornecedor</td>
										<td><input type="number" name="mov_cnpj" size="5" maxlength="5" disabled>
										</td>
									<td>Razão Social</td>
										<td><input type="text" name="razaosocial" size="50" maxlength="50" disabled></td>
								</tr>

								<tr>
									<td>Custo do Produto</td>
									<td><input type="number" name="mov_custo" size="10" maxlength="10" disabled></td>
									<td>Valor de Venda</td>
									<td><input type="number" name="mov_venda" size="10" maxlength="10" disabled></td>
								</tr>

								<tr>
									<td>quantidade</td>
									<td><input type="number" name="mov_quantidade" size="5" maxlength="5" disabled></td>
								</tr>

								<tr>
									<td>Data e Hora</td>
									<td>
										<input type="text" name="mov_datahora" value = "" disabled >
									</td>
								</tr>
							</table>    
							<br>
							<a href="index.php" class="btn btn-outline-secondary">Voltar</a>
							<input class="btn btn-outline-success" type="submit" name="botaoenviar" value="Gravar" disabled>
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