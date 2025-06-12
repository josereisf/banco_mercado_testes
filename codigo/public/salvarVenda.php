<?php
require_once "../funcoes.php";
require_once "../conexao.php";
session_start();


$ignorar = 0;
if (isset($_POST['idcliente'])) {
    $_SESSION['idcliente'] = $_POST["idcliente"];
    $_SESSION['valor_total'] = $_POST["valor"];
    $_SESSION['data'] = $_POST["data"];
    $_SESSION['produtos'] = $_POST["produto"];
    $_SESSION['quantidades'] = $_POST["quantidade"];
}
$idcliente = $_SESSION["idcliente"];
$valor_total = $_SESSION["valor_total"];
$data = $_SESSION["data"];
$produtos = $_SESSION["produtos"];
$quantidades = $_SESSION["quantidades"];

$tudojunto = [];

$q_erro = 0;
if (isset($_GET['ignorar'])) {
    $ignorar = $_GET['ignorar'];
}
for ($i = 0; $i < sizeof($quantidades); $i++) {
    if (!empty($produtos[$i]) and !empty($quantidades[$i])) {
        $tudojunto[$i][0] = $produtos[$i];
        $tudojunto[$i][1] = $quantidades[$i];
    } elseif (!empty($quantidades[$i]) or !empty($produtos[$i])) {
        $q_erro++;
    }
}
if ($q_erro > 0 and $ignorar == 0) {
    header("Location: confirmacao.php?erro=$q_erro");
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

echo "<br>";
echo "<a href='formularioVenda.php'>Continuar</a>";