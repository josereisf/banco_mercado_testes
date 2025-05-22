<?php
require_once "../funcoes.php";
require_once "../conexao.php";

$idcliente = $_POST["idcliente"];
$valor_total = $_POST["valor"];
$data = $_POST["data"];
$produtos = $_POST["produto"];

//$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);

//foreach ($produtos as $p) {
//    salvarItemVenda($conexao, $id_venda, $p[0], $p[1]);
//}
echo "<pre>";
print_r($produtos);
//print_r(listarItemVendas($conexao));
echo "</pre>";
