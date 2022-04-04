<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" type="text/css" href="./css/Cliente.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	
	<title>Clientes</title>
   
</head>
<body>
	<div class="container">
		<div class="row">
			<?php
				include_once 'Conexao.php';
				$cpf = $_POST['cpf'];
				$nome = $_POST['nome'];
				$endereco = $_POST['endereco'];
				$numero = $_POST['numero'];
				$bairro = $_POST['bairro'];
				$cidade = $_POST['cidade'];
				$uf = $_POST['uf'];
				$cep = $_POST['cep'];
				$nascimento = $_POST['nascimento'];
				$sexo = '';
				$celular = $_POST['celular'];
				$email = $_POST['email'];
				$salario = $_POST['salario'];
				$cor = $_POST['cor'];
				$curso = $_POST['curso'];

				$sql = "SELECT * FROM clientes WHERE cpf = '$cpf'";
				if ($resultado = mysqli_query($conexao,$sql)) {
					if ($campo = mysqli_fetch_array($resultado)) {
						$sql = "UPDATE `clientes` SET `nome`='$nome',`endereco`='$endereco',`numero`='$numero',`bairro`='$bairro',`cidade`='$cidade',`uf`='$uf',`cep`='$cep',`nascimento`='$nascimento',`sexo`='$sexo',`celular`='$celular',`email`='$email',`salario`='$salario',`cor`='$cor',`curso`='$curso' 
						WHERE cpf = '$cpf'";
						if (mysqli_query($conexao,$sql)) {
							echo "Cliente Atualizado com sucesso!";
						}else{
							echo "deu problema<br>";
							echo $conexao->error . '<br>' . $sql;
						}
					}else{
						$sql = "INSERT INTO `clientes`(`cpf`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `cep`, `nascimento`, `sexo`, `celular`, `email`, `salario`, `cor`, `curso`) 
						VALUES ('$cpf','$nome','$endereco','$numero','$bairro','$cidade','$uf','$cep','$nascimento','$sexo','$celular','$email','$salario','$cor','$curso')";
									
							//echo 'SQL =' . $sql . '<br>';		
							if (mysqli_query($conexao,$sql)){
								echo 'Cadastro realizado com sucesso!';
							}else{
								echo 'não foi =(';
								echo $conexao->error . '<br>' .$sql;					
								}
						}
				}
			?>
			<a href="clientes.php" class="btn btn-primaty">Voltar</a>
		</div>
	</div>
	<?php
	include_once 'Rodape.php';
	include_once 'bootjs.php';
	?>
</body>
</html>