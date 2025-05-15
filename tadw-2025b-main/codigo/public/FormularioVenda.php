<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='salvarVenda.php'>
    Nome do cliente:<br>
    <input type="text" name="nome"><br>
    Valor total:<br>
    <input type="text" name="valor" ><br>
    Data:<br>
    <input type="text" name="data" ><br><br><br>

    <?php
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $resultados = listarProdutos($conexao);
    foreach ($resultados as $r){
        echo "<input type='checkbox' name='produto' >".$r['nome']."<input type='text' name='quantidade' ><br>";
    }
    ?>

    <input type="submit" value="Salvar"> 
    </form>

</body>
</html>