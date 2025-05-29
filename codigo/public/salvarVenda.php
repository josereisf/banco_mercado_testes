<?php
require_once "../funcoes.php";
require_once "../conexao.php";

$idcliente = $_POST["idcliente"];
$valor_total = $_POST["valor"];
$data = $_POST["data"];
$produtos = $_POST["produto"];
$quantidades = $_POST["quantidade"];

$tudojunto = array($produtos, $quantidades);
$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);

$i = 0;
foreach ($tudojunto as $tj) {
    for ($i = 0; $i < sizeof($tj[1]); $i++) {
        if ($tj[1][$i] == null){
        salvarItemVenda($conexao, $id_venda, $tj[0][$i], $tj[1][$i]);
        }
    }
}

echo "<pre>";
print_r($tudojunto);
print_r(listarItemVendas($conexao));
echo "</pre>";
