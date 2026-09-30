<?php

function breakingRecords($scores)
{
  // Write your code here
  $n = count($scores);
  if ($n <= 1) {
    return [];
  }

  // los dos empiezan en el primer score
  $puntoMaximo = $scores[0];
  $puntoMinimo = $scores[0];

  // puntaje cada que se rompe un record 
  $contadorMaximo = 0;

  //puntaje cada que el recor es menor
  $contadorMinimo = 0;

  foreach ($scores as $score) {

    // Si se rompe el recor se suma 1
    if ($score > $puntoMaximo) {
      $puntoMaximo = $score;
      $contadorMaximo++;
    }

    // Si el recor es menor se suma 1
    if ($score < $puntoMinimo) {
      $puntoMinimo = $score;
      $contadorMinimo++;
    }
  }

  return [$contadorMaximo, $contadorMinimo];
}

echo implode(" ", breakingRecords([10, 5, 20, 20, 4,  5, 2, 25, 1])); // Salida esperada: [2, 4]