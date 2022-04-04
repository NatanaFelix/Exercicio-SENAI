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

$chave = $_POST ['mov_barras']; 
$sql = "SELECT `codigo_de_barras`, `descricao`, `unidade`, `pesoproduto`, `custoproduto`, `vendaproduto`, `ultima_venda`, `fornecedor`, `quantidade`, `minimo`, `imagem` FROM `produtos` 
INNER JOIN fornecedores ON produtos.fornecedor = fornecedores.cnpj WHERE codigo_de_barras = '$chave'";
$resultado = mysqli_query($conexao, $sql); 
$campo = mysqli_fetch_array($resultado);
if (isset($campo['codigo_de_barras'])){
	$descricao = $campo['descricao'];
	$unidade = $campo['unidade'];
	$pesoproduto = $campo['pesoproduto'];
	$custoproduto = $campo['custoproduto'];
	$vendaproduto = $campo['vendaproduto'];
	$quantidade = $campo['quantidade'];
	$minimo = $campo['minimo'];
	$imagem = $campo['imagem'];
	$fornecedor = $campo['fornecedor'];
	$razaosocial = $campo['razaosocial'];

	}else{
		echo "<br><br><br><br><br>não achei nada com este codigo!<br><br><br><br><br>";
		echo "<a href='movimentacao.php'> <button>Voltar</button> </a>";
		echo $conexao->error;
	}
?>
<br><br>
	<div class="container">
		<div class="row">
			<div class="col">
					<form action="incluir-movimentacao.php" method="POST" > 
						<fieldset id="cabecalho1" style="align-items: center; background-color: grey;  ">
							MOVIMENTAÇÃO DE PRODUTOS
						</fieldset>
						<fieldset style="background-color: lightgrey;">
							<table>
								<tr>
									<td>Código de Barras</td>
									<td><input  type="number" name="mov_barras" size="13" maxlength="13" required>
									<input type="hidden" name="mov_barras" value="<?php echo $chave; ?>">
									</td>

									<td>Descrição</td>
										<td><input type="text" name="descricao" size="50" maxlength="50" value="<?php echo $descricao; ?>">
									</td>
								</tr>

								<tr>
									<td>Unidade</td>
									<td>
										<select name="unidade" value="<?php echo $unidade ?>" >
											<option value="<?php echo $unidade; ?>">
												<?php echo retornaunidade($unidade); ?>
											</option>
										</select>
									</td>

									<td>Peso</td>
										<td><input type="number" name="pesoproduto" size="5" maxlength="5" value="<?php echo $pesoproduto ?>" >
									</td>
								</tr>

								<tr>
									<td>Custo</td>
									<td>
										<input type="number" name="custoproduto" size="10" maxlength="10" value="<?php echo $custoproduto ?>">
										<input type="hidden" name="custoproduto" value="<?php echo $custo; ?>">
									</td>
									<td>Venda</td>
									<td>
										<input type="number" name="ultima_venda" size="10" maxlength="10" value="<?php echo $ultima_venda ?>">
										<input type="hidden" name="ultima_venda" value="<?php echo $ultima_venda; ?>">
									</td>
								</tr>

								<tr>
									<td>Em Estoque</td>
									<td><input type="number" name="quantidade" size="5" maxlength="5" value="<?php echo $quantidade ?>"></td>
									<input type="hidden" name="quantidade" value="<?php echo $quantidade ?>">
									<td>Estoque Mínimo</td>
									<td><input type="number" name="minimo" size="5" maxlength="5" value="<?php echo $minimo ?>" ></td>
								</tr>

								<tr>
									<td>Imagem</td>
									<td><input type="file" name="imagem" value="<?php echo $imagem ?>"></td>
								</tr>

								<tr>
									<td>Fornecedor</td>
										<td><input type="number" name="mov_cnpj" size="5" maxlength="5" value="<?php echo $fornecedor ?>">
										<input type="hidden" name="mov_cnpj" value="<?php echo $fornecedor; ?>">
										</td>
									<td>Razão Social</td>
										<td><input type="text" name="razaosocial" size="50" maxlength="50" value="<?php echo $razaosocial ?>"></td>
								</tr>

								<tr>
									<td>Custo do Produto</td>
									<td><input type="number" name="mov_custo" size="10" maxlength="10"></td>
									<td>Valor de Venda</td>
									<td><input type="number" name="mov_venda" size="10" maxlength="10"></td>
								</tr>

								<tr>
									<td>quantidade</td>
									<td><input type="number" name="mov_quantidade" size="5" maxlength="5" required></td>
								</tr>

								<tr>
									<td>Data e Hora</td>
									<td>
										<input type="text" name="mov_datahora" value = "<?php echo datasistematela(); ?>" disabled >
									</td>
									<td>
										<input type="hidden" name="mov_datahora" value = "<?php echo datasistematela(); ?>" >
									</td>
								</tr>
							</table>    
							<br>
							<a href="movimentacao-produtos.php" class="btn btn-outline-secondary">Voltar</a>
							<input class="btn btn-outline-success" type="submit" name="botaoenviar" value="Gravar">
							<br>
						</fieldset>
					</form>
				</div>
		</div>
	</div>
<a href="movimentacao.php"> <button>Voltar</button> </a>
<?php
include_once 'Rodape.php';
include_once 'bootjs.php';
?>

</body>
</html>