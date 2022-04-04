<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="./css/Fornecedores.css">
	
	<?php
	include_once 'bootmeta.php';
	?>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	
	<title>Fornecedores</title>
	
</head>
<body>

	<?php
		include_once 'navbar.php';
		include_once 'Conexao.php';
	?>
	<div class="container">
			<div class="row">
				<div class="col">
					<form action="mostrar-fornecedores.php" method="POST">
						<fieldset style="align-items: center; background-color: grey;  ">
							CADASTRO DE FORNECEDORES
						</fieldset>
						<fieldset style="background-color: lightgrey;">
							<table>
								<tr>
									<td>CNPJ</td>
									<td><input type="number" name="cnpj" size="15" maxlength="15" required>
									<button>BUSCAR</button></td>
									<td>Razão Social</td>
									<td><input type="text" name="razaosocial" size="50" maxlength="50" disabled></td>
								</tr>
								<tr>
									<td>Telefone 1</td>
									<td><input type="text" name="telefone1" size="15" maxlength="15" disabled></td>
									<td>Telefone 2</td>
									<td><input type="text" name="telefone2" size="15" maxlength="15" disabled></td>
								</tr>
								<tr>
									<td>Celular</td>
									<td><input type="text" name="celular" size="15" maxlength="15" disabled></td>
									<td>Whatsapp</td>
									<td><input type="text" name="whatsapp"  size="15" maxlength="15" disabled></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><input type="email" name="email" size="50" maxlength="50" disabled></td>
								</tr>
							</table>
							<br>
							<table>
								<tr>
									<td>Data do Cadastro</td>
									<td><input type="date" name="datacompra" disabled></td>
									<td>Data da Última Venda</td>
									<td><input type="date" name="datavenda" disabled></td>
								</tr>
								<tr>
									<td>Saldo de Compras</td>
									<td><input type="number" name="saldocompras"  size="15" maxlength="15" style="text-align: right;" disabled></td>
								</tr>
							</table>
							<br>
							<table>
								<tr>
									<td>Banco</td>
									<td><input type="text" name="banco" size="3" maxlength="3" disabled></td>
									<td>Agencia</td>
									<td><input type="text" name="agencia" size="5" maxlength="5" disabled></td>
									<td>Conta</td>
									<td><input type="text" name="conta" size="15" maxlength="15" disabled></td>
								</tr>
							</table>
							<table>
								<tr>
									<td>Status</td>
									<td><input type="radio" name="status" value="ativo" disabled>Ativo</td>
									<td><input type="radio" name="status" value="ativo" disabled>Inativo</td>
								</tr>
							</table>
							<br>
							Observação<br>
							<textarea name="observacoes" rows="5" cols="50" minlength="1" maxlength="500" disabled></textarea>
							<br>
							<input type="submit" name="botaoenviar" value="Gravar" disabled>
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