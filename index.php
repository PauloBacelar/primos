<?php
// Ordenando números digitados pelo usuário
function ordenar($n1, $n2) {
  if ($n1 > $n2) {
    return [$n2, $n1];
  }
  else {
    return [$n1, $n2];
  }
}

// Função principal
function primos($inicial, $final) {
  $primos = [];

  for ($i = intval($inicial) + 1;$i < $final;$i++) {
    for ($j = 2;$j < $i;$j++) {
      if ($i % $j == 0) {
        break;
       }

      if ($j == $i - 1) {
        array_push($primos, $i);
       }
     }
   }

  return $primos;
}

// Obtendo os valores digitados pelo usuário
if (isset($_GET['n1']) && isset($_GET['n2'])) {
  $n1 = $_GET['n1'];
  $n2 = $_GET['n2'];

  $numerosOrdenados = ordenar($n1, $n2);
  $primos = primos($numerosOrdenados[0], $numerosOrdenados[1]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <title>Função primos</title>
    <link rel="stylesheet" href="./styles.css">
  </head>

  <body>
    <form action="index.php" method="GET">
      <input type="number" name="n1" required placeholder="Digite o primeiro número"><br />
      <input type="number" name="n2" required placeholder="Digite o segundo número"><br />
      <button type="submit">Encontrar primos</button>
    </form>

    <p class="resultado" name="primos">
      <?php 
        if(isset($_GET['n1']) && isset($_GET['n2'])) {
            echo "<strong>Primos entre $n1 e $n2</strong> <br />" . implode(", ", $primos);
        }
      ?>
    </p>
  </body>
</html>