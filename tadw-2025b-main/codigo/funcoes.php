<?php

function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function salvarCliente($conexao, $nome, $cpf, $endereco) {
    $sql = "INSERT INTO tb_cliente (nome, cpf, endereco) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $endereco);
    
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}

function listarClientes($conexao) {
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultados)) {
        $lista_clientes[] = $cliente;
    }
    mysqli_stmt_close($comando);

    return $lista_clientes;
}

function editarCliente($conexao, $nome, $cpf, $endereco, $id){
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $endereco, $id);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}
function deletarProduto($conexao, $idproduto) {
    $sql = "DELETE FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idproduto);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}
function salvarProduto($conexao, $nome, $tipo, $pc, $pv, $ml, $quant) {
    $sql = "INSERT INTO tb_produto (nome, tipo, preco_compra, preco_venda, margem_lucro, quantidade) VALUES (?,?,?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssddd', $nome, $tipo, $pc, $pv, $ml, $quant);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}
function editarProduto($conexao, $nome, $tipo, $pc, $pv, $ml, $quant, $id) {
    $sql = "UPDATE tb_produto SET (nome, tipo, preco_compra, preco_venda, margem_lucro, quantidade) VALUES (?,?,?,?,?,?) WHERE idproduto=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssddddi', $nome, $tipo, $pc, $pv, $ml, $quant, $id);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}
function listarProdutos($conexao) {
    $sql = "SELECT * FROM tb_produto";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultados)) {
        $lista_produtos[] = $produto;
    }
    mysqli_stmt_close($comando);

    return $lista_produtos;
}
function salvarUsuario($conexao, $nome, $email, $senha){
    $senhah = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tb_usuario (nome, email, senha) VALUES (?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senhah);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}
function salvarVenda($conexao, $idc, $idp, $valort, $data){
    $sql = "INSERT INTO tb_venda (idcliente, idproduto, valor_total, data) VALUES (?,?,?,?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iids', $idc, $idp, $valort, $data);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
}
function pesquisarClienteId($conexao, $id){
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $id);
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    $cliente = mysqli_fetch_assoc($resultados);
    mysqli_stmt_close($comando);
    return $cliente;
}
function pesquisarProdutoId($conexao, $id){
    $sql = "SELECT * FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $id);
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    $produto = mysqli_fetch_assoc($resultados);
    mysqli_stmt_close($comando);
    return $produto;
}
function listarVendas($conexao){
    $sql = "SELECT v.idvenda, c.nome AS cnome, p.nome AS pnome, v.valor_total, v.data   FROM tb_venda AS v, tb_cliente AS c, tb_produto AS p WHERE v.idcliente = c.idcliente AND v.idproduto = p.idproduto ";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_venda = [];
    while ($venda = mysqli_fetch_assoc($resultados)) {
        $lista_venda[] = $venda;
    }
    mysqli_stmt_close($comando);

    return $lista_venda;
}
?>