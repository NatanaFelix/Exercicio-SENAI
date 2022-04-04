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

		// pegar a chave de busca (cnpj) passado pelo metodo POST
		$chave = $_POST['cnpj']; 
		$sql = "SELECT * FROM fornecedores WHERE cnpj = '$chave'"; 
		$resultado = mysqli_query($conexao, $sql); 
		$campo = mysqli_fetch_array($resultado);
		
		$razaosocial = $campo ['razaosocial'] ?? ''; 
		$telefone1 = $campo ['telefone1'] ?? ''; 
		$telefone2 = $campo ['telefone2'] ?? ''; 
		$celular = $campo ['celular'] ?? ''; 
		$whatsup = $campo ['whatsup'] ?? ''; 
		$email = $campo ['email'] ?? ''; 
		$datacompra = $campo ['datacompra'] ?? ''; 
		$datavenda = $campo ['datavenda'] ?? ''; 
		$saldocompras = $campo ['saldocompras'] ?? ''; 
		$observacoes = $campo ['observacoes'] ?? ''; 
		$status = $campo ['status'] ?? ''; 
		$banco = $campo ['banco'] ?? ''; 
		$agencia = $campo ['agencia'] ?? ''; 
		$conta = $campo ['conta'] ?? ''; 
		

	?>
	<div class="container">
			<div class="row">
				<div class="col">
					<form action="incluir-fornecedo.php" method="POST">
						<fieldset style="align-items: center; background-color: grey;  ">
							CADASTRO DE FORNECEDORES
						</fieldset>
						<fieldset style="background-color: lightgrey;">
							<table>
								<tr>
									<td>CNPJ</td>
									<td><input type="number" name="cnpj" size="15" maxlength="15" value="<?php echo $chave; ?>" >
									<input type='hidden' name="cnpj" value="<?php echo $chave; ?>">
									<td>Razão Social</td>
									<td><input type="text" name="razaosocial" size="50" maxlength="50" value="<?php echo $razaosocial; ?>"></td>
								</tr>
								<tr>
									<td>Telefone 1</td>
									<td><input type="text" name="telefone1" size="15" maxlength="15" value="<?php echo $telefone1; ?>"></td>
									<td>Telefone 2</td>
									<td><input type="text" name="telefone2" size="15" maxlength="15" value="<?php echo $telefone2; ?>"></td>
								</tr>
								<tr>
									<td>Celular</td>
									<td><input type="text" name="celular" size="15" maxlength="15" value="<?php echo $celular; ?>"></td>
									<td>Whatsapp</td>
									<td><input type="text" name="whatsapp"  size="15" maxlength="15" value="<?php echo $whatsup; ?>"></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><input type="email" name="email" size="50" maxlength="50" value="<?php echo $email; ?>"></td>
								</tr>
							</table>
							<br>
							<table>
								<tr>
									<td>Data do Cadastro</td>
									<td><input type="date" name="datacompra" value="<?php echo $datacompra; ?>"></td>
									<td>Data da Última Venda</td>
									<td><input type="date" name="datavenda" value="<?php echo $datavenda; ?>"></td>
								</tr>
								<tr>
									<td>Saldo de Compras</td>
									<td><input type="number" name="saldocompras"  size="15" maxlength="15" style="text-align: right;" value="<?php echo $saldocompras; ?>"></td>
								</tr>
							</table>
							<br>
							<table>
								<tr>
									<td>Banco</td>
									<td><input type="text" name="banco" size="3" maxlength="3" value="<?php echo $banco; ?>"></td>
									<td>Agencia</td>
									<td><input type="text" name="agencia" size="5" maxlength="5" value="<?php echo $agencia; ?>"></td>
									<td>Conta</td>
									<td><input type="text" name="conta" size="15" maxlength="15" value="<?php echo $conta; ?>"></td>
								</tr>
							</table>
							<table>
								<tr>
									<td>Status</td>
									<td><input <?php if ($status == 'A') {echo "checked";}; ?> type="radio" name="status" value="A">Ativo</td>
									<td><input <?php if ($status == 'I') {echo "checked";}; ?> type="radio" name="status" value="I">Inativo</td>
								</tr>
							</table>
							<br>
							Observação<br>
							<textarea name="observacoes" rows="5" cols="50" minlength="1" maxlength="500" value="<?php echo $observacoes; ?>"></textarea>
							<br>
							<input type="submit" name="botaoenviar" value="Gravar">
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