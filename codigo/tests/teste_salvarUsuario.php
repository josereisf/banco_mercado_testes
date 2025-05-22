<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "arroz";
    $email= "joaozin@gmail.com";
    $senha = "123";


    if (!is_null(salvarUsuario($conexao, $nome, $email, $senha))) {
        echo "funcionou";
    } else {
        echo "não funcionou";
    }
?>