<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "arroz";
    $tipo = "carne";
    $pc = 3.20;
    $pv = 7.90;
    $ml = 2;
    $quant = 7;

    
    if (!is_null(salvarProduto($conexao, $nome, $tipo, $pc, $pv, $ml, $quant))) {
        echo "funcionou";
    } else {
        echo "não funcionou";
    }
?>