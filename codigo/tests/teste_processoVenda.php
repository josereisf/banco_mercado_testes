<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 2;
$valor_total = 30.2;
$data = "2025-12-30";

$produtos = [

    [1, 3], 
    [3, 5], 
    [2, 1],
];


$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);

foreach ($produtos as $p) {
    salvarItemVenda($conexao, $id_venda, $p[0], $p[1]);
}
echo "<pre>";
print_r(listarItemVendas($conexao));
echo "</pre>";