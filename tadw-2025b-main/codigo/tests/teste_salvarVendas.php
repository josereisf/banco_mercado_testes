<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idc = 1;
    $idp = 1;
    $valort = 10.5;
    $data = "2013-12-05"; 

    
    if (!is_null(salvarVenda($conexao, $idc, $idp, $valort, $data))) {
        echo "funcionou";
    } else {
        echo "não funcionou";
    }