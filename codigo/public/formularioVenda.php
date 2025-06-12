<?php

session_start();
if (isset($_GET['reset']) and $_GET['reset'] == 1){
    session_destroy();
    header("Location: formularioVenda.php");
}
if (isset($_SESSION["idcliente"])) {
    $idcliente = $_SESSION["idcliente"];
    $valor_total = $_SESSION["valor_total"];
    $data = $_SESSION["data"];
    $produtos = $_SESSION["produtos"];
    $quantidades = $_SESSION["quantidades"];
} else {
    $idcliente = '';
    $valor_total = '';
    $data = '';
    $produtos = '';
    $quantidades = '';
}

?>
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

            foreach ($resultados as $r) {
                if ($r['idcliente'] == $idcliente) {
                    $selecionado = 'selected';
                } else {
                    $selecionado = '';
                }
                echo "<option value='" . $r['idcliente'] . "'$selecionado>" . $r['nome'] . "</option>";
            }
            ?>
        </select><br>
        Valor:<br>
        <input type="text" name="valor" value="<?php echo $valor_total; ?>"><br>
        Data:<br>
        <input type="date" name="data" value="<?php echo $data; ?>"><br><br><br>

        <?php
        $resultados = listarProdutos($conexao);

        for ($i = 0; $i < sizeof($resultados); $i++) {
            $selecionado = '';
            $valor = 0;

            if (!empty($_SESSION["idcliente"])) {
                if (!empty($produtos[$i])) {
                    if ($resultados[$i]['idproduto'] == $produtos[$i]) {
                        $selecionado = "checked";
                    }
                }
                if (!empty($quantidades[$i])) {
                    $valor = $quantidades[$i];
                }
            }
            echo '<input type="checkbox" name="produto[' . $i . ']" value="' . $resultados[$i]['idproduto'] . '"' . $selecionado . '>' . $resultados[$i]['nome'];
            echo '<input type="number" name="quantidade[' . $i . ']" value="' . $valor . '">';
            echo '<br>';
        }


        ?>
        <input type="submit" value="Salvar"> <a href="formularioVenda.php?reset=1">Resetar</a>
    </form>

</body>

</html>