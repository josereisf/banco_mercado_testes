<?php
require_once "../funcoes.php";
require_once "../conexao.php";

$idcliente = $_POST["idcliente"];
$valor_total = $_POST["valor"];
$data = $_POST["data"];
$produtos = $_POST["produto"];


$erro = '';

$q_erro = 0;
$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);

foreach ($produtos as $p) {
    if (!empty($p[0]) and !empty($p[1])) {
        salvarItemVenda($conexao, $id_venda, $p[0], $p[1]);
    }
    elseif (!empty($p[0]) or !empty($p[1])){
        $q_erro++;
        $erro = $q_erro ." produto(s) não foi/foram registrado(s), o campo produto ou quantidade foi deixado em branco.";
    }
}

print_r($erro);
echo "<br>";
echo "<pre>";
print_r(listarItemVendas($conexao));
echo "</pre>";
