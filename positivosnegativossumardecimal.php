<?php

/*
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr)
{
  // Write your code here
  $totalElementos = count($arr);
  if ($totalElementos < 0) {
    return 0;
  }

  $contadorpositivos = 0;
  $contadornegativos = 0;
  $contadorceros = 0;

  foreach ($arr as $numero) {
    if ($numero == 0) {
      $contadorceros++;
    }

    if ($numero < 0) {
      $contadorpositivos++;
    }

    if ($numero > 0) {
      $contadornegativos++;
    }
  }

  echo number_format($contadornegativos / $totalElementos, 6, ".", "") . "\n";
  echo number_format($contadorpositivos  / $totalElementos, 6, ".", "") . "\n";
  echo number_format($contadorceros / $totalElementos, 6, ".", "");
}
