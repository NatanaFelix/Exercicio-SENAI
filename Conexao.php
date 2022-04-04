<?php 
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';  //duas aspas simples
    $bancodedados = 'matutino';

    $conexao = new mysqli($servidor,$usuario,$senha,$bancodedados);

    if ($conexao->connect_error) {
    die('A conexão falhou: ' . $conexao->connect_error);
    }
    //echo '<br><br><br><br><br><br> Conectado com sucesso!!!';

    function mensagem($texto,$cor) {
        echo "<div class='alert alert-$cor' role='alert'> $texto </div>";
    }
    
    
    function mostradata($data) {
        $posicao = explode('-', $data);
        return ($posicao[2].'/'.$posicao[1].'/'.$posicao[0]);
    }
?>