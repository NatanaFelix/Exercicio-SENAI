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
	
	<title>Mostrar Produtos</title>
   
</head>
	<body>
		<?php
			include_once 'navbar.php';
			include_once 'Conexao.php';
			include_once 'funcoes.php';

            // pega o name(cpf) que veio do formulário anterior (clientes.php) e coloca na variavel $chave
            $chave = $_POST['cpf'];

            // monta a query que vai ser executada na variavel $sql
            $sql = "SELECT * FROM clientes WHERE cpf = '$chave'";

            // realiza uma busca na tabela clientes usando a chave de busca cpf = $chave com a query $sql
            $resultado = mysqli_query($conexao,$sql);

            // separa $resultado em $campo (array) para poder chamar ex: $campo['endereco'], onde endereco é o nome do campo na tabela
            $campo = mysqli_fetch_array($resultado);

            // coloca em variaveis todos os campos da tabela clientes que foi selecionada pela chave passada no método POST
            $nome = $campo['nome'] ?? '' ;
            $endereco = $campo['endereco'] ?? '';
            $numero = $campo['numero'] ?? '';
            $bairro = $campo['bairro'] ?? '';
            $cidade = $campo['cidade'] ?? '';
            $uf = $campo['uf'] ?? '';
            $cep = $campo['cep'] ?? '';
            $nascimento = $campo['nascimento'] ?? '';
            $sexo = $campo['sexo'] ?? '';; 
            $celular = $campo['celular'] ?? '';
            $email = $campo['email'] ?? '';;
            $salario = $campo['salario'] ?? '';
            $cor = $campo['cor'] ?? '';
            $curso = $campo['curso'] ?? '';
		?>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<form action="incluir-cliente.php" method="POST">
						<fieldset style="align-items: center; background-color: grey;  ">
							CADASTRO DE CLIENTES
						</fieldset>
						<fieldset style="background-color: lightgrey;">
							<table>
								<tr>
									<td>CPF</td>
									<td><input type="text" name="cpf" size="11" maxlength="11" style="text-align: right;" disabled value="<?php echo $chave; ?>">
                                    <input name = "cpf" type="hidden" value = "<?php echo $chave; ?>">
									<td>Nome Completo</td>
									<td><input type="text" name="nome" size="50" maxlength="50" value="<?php echo $nome ?>"></td>
								</tr>
								<tr>
									<td>Endereço</td>
									<td><input type="text" name="endereco" size="50" maxlength="50" value="<?php echo $endereco ?>"></td>
									<td>Número do Endereço</td>
									<td><input type="text" name="numero" size="10" maxlength="10" value="<?php echo $numero ?>"></td>
								</tr>
									<tr>
										<td>Bairro</td>
										<td><input type="text" name="bairro"  size="30" maxlength="30" value="<?php echo $bairro ?>"></td>
										<td>Cidade</td>
										<td><input type="text" name="cidade" size="30" maxlength="30" value="<?php echo $cidade ?>"></td>
									</tr>
									<tr>
										<td>UF</td>
										<td><select id="ufdoestado" name="uf" value="<?php echo $uf ?>" >
										<option value="<?php echo retornauf($uf); ?>" selected ><?php echo retornauf($uf); ?></option>
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
										<td><input type="text" name="cep"size="8" maxlength="8" value="<?php echo $cep ?>" ></td>
									</tr>
									<tr>									
										<td>Data Nascimento</td>
										<td><input type="date" name="nascimento" value="<?php echo $nascimento ?>"></td>
									</tr>			
								</table>
								<br>
								<tr>
									<td>Sexo</td>
									<td><input <?php if ($sexo == 'M') {echo "checked";}?> type="radio" name="sexo" value="M" >Masculino</td>
									<td><input <?php if ($sexo == 'F') {echo "checked";}?> type="radio" name="sexo" value="F" >Feminino</td>
									<td><input <?php if ($sexo == 'N') {echo "checked";}?> type="radio" name="sexo" value="N" >Não declarado</td>
								</tr>
								<br>
								<br>
								<table >
									<tr>
										<td>Telefone/Celular</td>
										<td><input  type="text" name="celular" size="9" maxlength="9" value="<?php echo $celular ?>"> </td>
										<td>Email</td>
										<td><input type="email" name="email"size="50" maxlength="50" value="<?php echo $email ?>"></td>
									</tr>
									<tr>
										<td>Salário Pretendido</td>
										<td>
											<input type="number" name="salario" size="10" maxlength="10" style="text-align: right;" value="<?php echo $salario ?>">
										</td>
										<td>Selecione sua cor preferida</td>
										<td><input type="color" id='cor' name='cor' value="<?php echo $cor ?>"></td>
									</tr>
								</table>
								</tr>
								<br>
								Cursos que fez
								<br>
								<textarea name="curso" rows="5" cols="50" maxlength="500" value="<?php echo $curso ?>"></textarea>
								<br>
								<a href="clientes.php" class="btn btn-outline-secondary">Voltar</a>
								<input class="btn btn-outline-success" type="submit" name="botaoenviar" value="Gravar">
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