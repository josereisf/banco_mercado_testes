<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action='salvarVenda.php' method='post'>
        Cliente:
        <select name="idcliente">
            <?php
            require_once "../funcoes.php";
            require_once "../conexao.php";

            $resultados = listarClientes($conexao);

            foreach($resultados as $r){
                echo "<option value='".$r['idcliente']."'>".$r['nome']."</option>";
            }
            ?>
        </select><br>
        Valor:<br>
        <input type="text" name="valor"><br>
        Data:<br>
        <input type="date" name="data"><br><br><br>

        <?php
        $resultados = listarProdutos($conexao);

        for ($i = 0; $i < sizeof($resultados); $i++) {
            echo '<input type="checkbox" name="produto['. $i .']" value="'. $resultados[$i]['idproduto'] .'">'.$resultados[$i]['nome'];
            echo '<input type="number" name="quantidade['. $i .']" />';
            echo '<br>';
        }
        
        
        ?>
        <input type="submit" value="Salvar">
    </form>

</body>

</html>