<?php 
// Funções - aqui fica as funções que vamos criar


// formata a data do padrão aaaa-mm-dd para dd/mm/aaaa
function formatadata($data) {   // passado na variavel $data 1990-07-31
	// guarda em um array os dados separados pelo '-'
	$parte = explode('-', $data);  // separado no array $parte[0] = '1990'
								   //					$parte[1] = '07'
								   //					$parte[2] = '31'
	return $parte[2] .'/'. $parte[1] .'/'. $parte[0];// volta 31/07/1990
}

// recebe uma mensagem e uma cor para fazer um alerta
function alerta($mensagem,$cor) {
	echo "<div class='alert alert-$cor' role='alert'> $mensagem </div>";
}

// recebe uma mensagem, uma cor e um link para colocar um botão na tela e enviar para o link (programa)
function botao($mensagem,$cor,$link) {
	echo "<a class='btn btn-$cor' href='$link' role='button'>$mensagem</a>";
}

// formata o valor passado para ter virgula nas casas decimais e ponto nos milhares
function formatavalor($valor) {
	return number_format($valor,2,',','.');
}

// retorna a data do sistema no padrão aaaa/mm/dd hh:mm:ss
function datasistemabanco() {
	date_default_timezone_set('America/Sao_Paulo');
	return date('Y/m/d H:i:s');

}
function datasistematela() {
	date_default_timezone_set('America/Sao_Paulo');
	return date('d/m/Y H:i:s');

}


?>
