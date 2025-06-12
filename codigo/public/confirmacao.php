<?php

$erro = $_GET["erro"] ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2><?php echo $erro; ?> produto(s) não foi registrado(s), o campo produto ou quantidade foi deixado em branco.</h2> <br>
  <h2> Deseja voltar e corrigir a compra ou continuar?(o produto não será salvo)</h2><br>
  <a href="formularioVenda.php">Retornar</a> <a href="salvarVenda.php?ignorar=1">Continuar</a>
</body>

</html>