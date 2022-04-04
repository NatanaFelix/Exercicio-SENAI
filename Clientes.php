<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" type="text/css" href="./css/Cliente.css">
	
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
			include_once 'navbar.php';
			include_once 'Conexao.php';
			include_once 'funcoes.php';
		?>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<form action="mostrar-cliente.php" method="POST">
						<fieldset style="align-items: center; background-color: grey;  ">
							CADASTRO DE CLIENTES
						</fieldset>
						<fieldset style="background-color: lightgrey;">
							<table>
								<tr>
									<td>CPF</td>
									<td><input type="text" name="cpf" size="11" maxlength="11" style="text-align: right;" required>
									<input type="submit" class="btn btn-outline-primary btn-sm" value="Buscar">
									<td>Nome Completo</td>
									<td><input type="text" name="nome" size="50" maxlength="50" disabled></td>
								</tr>
								<tr>
									<td>Endereço</td>
									<td><input type="text" name="endereco" size="50" maxlength="50" disabled></td>
									<td>Número do Endereço</td>
									<td><input type="text" name="numero" size="10" maxlength="10" disabled></td>
								</tr>
									<tr>
										<td>Bairro</td>
										<td><input type="text" name="bairro"  size="30" maxlength="30" disabled></td>
										<td>Cidade</td>
										<td><input type="text" name="cidade" size="30" maxlength="30" disabled></td>
									</tr>
									<tr>
										<td>UF</td>
										<td><select id="ufdoestado" name="uf" disabled >
											<option value="">Selecione</option>
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espirito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MT">Mato Grosso</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
										</select>
										</td>
										<td>CEP</td>
										<td><input type="text" name="cep"size="8" maxlength="8" disabled ></td>
									</tr>
									<tr>									
										<td>Data Nascimento</td>
										<td><input type="date" name="nascimento" disabled></td>
									</tr>			
								</table>
								<br>
								<tr>
									<td>Sexo</td>
									<td><input type="radio" name="sexo" value="M" disabled>Masculino</td>
									<td><input type="radio" name="sexo" value="F" disabled>Feminino</td>
									<td><input type="radio" name="sexo" value="N" disabled>Não declarado</td>
								</tr>
								<br>
								<br>
								<table >
									<tr>
										<td>Telefone/Celular</td>
										<td><input type="text" name="Celular" size="9" maxlength="9" disabled> </td>
										<td>Email</td>
										<td><input type="email" name="email"size="50" maxlength="50" disabled></td>
									</tr>
									<tr>
										<td>Salário Pretendido</td>
										<td>
											<input type="number" name="salario" size="10" maxlength="10" style="text-align: right;" disabled>
										</td>
										<td>Selecione sua cor preferida</td>
										<td><input type="color" id='cor' name='cor' disabled></td>
									</tr>
								</table>
								</tr>
								<br>
								Cursos que fez
								<br>
								<textarea name="curso" rows="5" cols="50" maxlength="500" disabled></textarea>
								<br>
								<label for="browser" disabled>Escolha o seu navegador:</label>
								<input list="browsers" name="browser" id="browser" disabled>
								<datalist id="browsers">
									<option value="Edge">
									<option value="Firefox">
									<option value="Chrome">
									<option value="Opera">
									<option value="Safari">
								</datalist>
								<br>
								<input type="submit" name="botaoenviar" value="Gravar" disabled>
								<br>
								<br>
							</table>
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