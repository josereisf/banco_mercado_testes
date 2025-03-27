<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "arroz";
    $email= "joaozin@gmail.com";
    $senha = "123";

    salvarUsuario($conexao, $nome, $email, $senha);
?>