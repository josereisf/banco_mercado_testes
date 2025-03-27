<?php

mysqli_query($conexao,"DELETE FROM tb_cliente");
require_once "teste_salvarCliente.php";
require_once "teste_editarCliente.php";
require_once "teste_listarClientes.php";
