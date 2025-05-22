<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $id = 1;
    $nome = "F1lano";
    $cpf = "322.456.234-11";
    $endereco = "Rua 11";
    
    if (!is_null(editarCliente($conexao, $nome, $cpf, $endereco, $id))) {
        echo "funcionou";
    } else {
        echo "não funcionou";
    }