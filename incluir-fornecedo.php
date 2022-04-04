<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="./css/Fornecedores.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	
	<title>Fornecedores</title>
	
</head>
<body>
    <div class="container">
        <div class="row">
        <?php 
			// faz a conexao com o banco de dados
			include_once 'conexao.php';
			// recuperar os dados do formulario fornecedores.php
			$chave = $_POST['cnpj'];
			$razaosocial = $_POST['razaosocial'];
			$telefone1 = $_POST['telefone1'];
			$telefone2 = $_POST['telefone2'];
			$celular = $_POST['celular'];
			$whatsapp = $_POST['whatsapp'];
			$email = $_POST['email'];
			$datacompra = $_POST['datacompra'];
			$datavenda = $_POST['datavenda'];
			$saldocompras = $_POST['saldocompras'];
			$banco = $_POST['banco'];
			$agencia = $_POST['agencia'];
			$conta = $_POST['conta'];
			$status = $_POST['status'];
			$observacoes = $_POST['observacoes'];

			// testa para ver se existe o CNPJ escolhido
			$sql = "SELECT * FROM fornecedores WHERE cnpj = '$chave'";

			// executa a conexao e a pesquisa pela chave ($chave)
			if ( $resultado = mysqli_query($conexao,$sql) ) {
				// verdadeiro (UPDATE)
				// testar se tem algo no $resultado
				if ( $campo = mysqli_fetch_array($resultado) ) {
					// se achou achou, é para atualizar, é para atualizar (UPDATE)
					// monta a query para ser executada
					$sql = "UPDATE `fornecedores` SET `cnpj`='$chave',`razaosocial`='$razaosocial',`telefone1`='$telefone1',`telefone2`='$telefone2',`celular`='$celular',`whatsup`='$whatsapp',`email`='$email',`datacompra`='$datacompra',`datavenda`='$datavenda',`saldocompras`='$saldocompras',
					`observacoes`='$observacoes',`status`='$status',`banco`='$banco',`agencia`='$agencia',`conta`='$conta' WHERE cnph = '$chave'";

					// executa a alteração na tabela usando a cnpj = $chave  
					if (mysqli_query($conexao,$sql)) {
						// deu certo
						echo "<br> Fornecedor Alterado com sucesso!";
					}else{
						// deu errado
						echo "<br> Deu problema<br>";
						echo $conexao->error;	
					}
				}else{
					// falso (INSERT)
					// monta a query a ser executada (sql)
					$sql = "INSERT INTO `fornecedores`(`cnpj`, `razaosocial`, `telefone1`, `telefone2`, `celular`, `whatsup`, `email`, `datacompra`, `datavenda`, `saldocompras`, `observacoes`, `status`, `banco`, `agencia`, `conta`) 
					VALUES ('$chave','$razaosocial','$telefone1','$telefone2','$celular','$whatsapp','$email','$datacompra','$datavenda','$saldocompras','$observacoes','$status','$banco','$agencia','$conta')";
						//echo "<br>" . $sql ;

						// executa e testa se foi feita a inclusão
						if (mysqli_query($conexao,$sql)) {
						echo "<br> Fornecedor cadastrado com sucesso!";
					}else{
						echo "<br> Deu problema<br>";
						echo $conexao->error;
					}
				}
			}else{
				echo "<br>Deu erro na conexão ou no select " . $sql;
			}

			// fecha a conexao com o banco de dados
			$conexao->close();
?>
<a href="fornecedores.php" class="button">Voltar</a>
        </div>
    </div>	
<?php
include_once 'Rodape.php';
include_once 'bootjs.php';
?>
		
</body>
</html>