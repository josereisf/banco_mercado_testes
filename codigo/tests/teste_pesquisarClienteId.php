<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$id= 1;

echo "<pre>";
print_r(pesquisarClienteId($conexao, $id));
echo "</pre>";
?>