<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $id = 1;
    $nome = "arroz";
    $tipo = "care";
    $pc = 3.20;
    $pv = 7.90;
    $ml = 2;
    $quant = 7;

if (!is_null(editarProduto($conexao, $nome, $tipo, $pc, $pv, $ml, $quant, $id))) {
    echo "funcionou";
} else {
    echo "não funcionou";
}
