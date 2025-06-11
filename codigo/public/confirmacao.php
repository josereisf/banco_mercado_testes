<?php

$erro = $_GET["erro"];

session_start();
print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2><?php echo $erro; ?></h2> <br>
  <h2> Deseja voltar e corrigir a compra ou continuar?(o produto não será salvo)</h2><br>
  <a href="formularioVenda.php">Retornar</a>
  <a href="salvarVenda.php">Continuar</a>
</body>

</html>