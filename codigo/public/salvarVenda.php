<?php
require_once "../funcoes.php";
require_once "../conexao.php";
session_start();

// $idcliente = $_POST["idcliente"];
// $valor_total = $_POST["valor"];
// $data = $_POST["data"];
// $produtos = $_POST["produto"];
// $quantidades = $_POST["quantidade"];

$_SESSION['idcliente'] = $_POST["idcliente"];
$_SESSION['valor_total'] = $_POST["valor"];
$_SESSION['data'] = $_POST["data"];
$_SESSION['produtos'] = $_POST["produto"];
$_SESSION['quantidades'] = $_POST["quantidade"];

$idcliente = $_SESSION["idcliente"];
$valor_total = $_SESSION["valor_total"];
$data = $_SESSION["data"];
$produtos = $_SESSION["produtos"];
$quantidades = $_SESSION["quantidades"];

$tudojunto = [];

$erro = '';
$q_erro = 0;
for ($i = 0; $i < sizeof($quantidades); $i++) {
    if (!empty($produtos[$i]) and !empty($quantidades[$i])) {
        $tudojunto[$i][0] = $produtos[$i];
        $tudojunto[$i][1] = $quantidades[$i];
    } elseif (!empty($quantidades[$i]) or !empty($produtos[$i])) {
        $q_erro++;
        $erro = $q_erro . " produto(s) não foi registrado(s), o campo produto ou quantidade foi deixado em branco.";
    }
}
if ($q_erro > 0) {
    header("Location: confirmacao.php?erro=$erro");
    exit;
}

$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);



foreach ($tudojunto as $tj) {
    salvarItemVenda($conexao, $id_venda, $tj[0], $tj[1]);
}
echo "<pre>";
//print_r($tudojunto);
echo "<br>";
print_r(listarItemVendas($conexao));
echo "</pre>";

session_destroy();
