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


$tudojunto = array(
    array('produtos' => $produtos, 'quantidades' => $quantidades)
);

$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);

foreach ($tudojunto as $tj) {
    // Agora $tj é um array associativo com 'produtos' e 'quantidades'
    $produtos = $tj['produtos'];
    $quantidades = $tj['quantidades'];

    // Usando um loop para percorrer ambos os arrays ao mesmo tempo
    for ($i = 0; $i < count($produtos); $i++) {
        // Verificando se o valor do produto não é null e se a quantidade existe
        if ($produtos[$i] != null && isset($quantidades[$i])) {
            salvarItemVenda($conexao, $id_venda, $produtos[$i], $quantidades[$i]);
        }
    }
}

echo "<pre>";
print_r($tudojunto);
print_r(listarItemVendas($conexao));
echo "</pre>";
