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
    <input type="text" name="cliente"><br>
    Valor total:<br>
    <input type="text" name="valor" ><br>
    Data:<br>
    <input type="text" name="data" ><br>

    <?php
    require_once "../funcoes.php";
    require_once "../conexao.php";
    
    $resultados = [];
    $resultados[] = listarProdutos($conexao);
    print_r ($lista_produtos);



    ?>
    </form>

</body>
</html>