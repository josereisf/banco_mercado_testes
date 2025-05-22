<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

if    (!is_null(deletarCliente($conexao, 1))){
    echo "funcionou";
}
else {
    echo "não funcionou";
}

?>