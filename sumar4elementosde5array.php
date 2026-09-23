<?php

/* function miniMaxSum($arr)
{
  // Write your code here
  $countArray = count($arr);

  if ($countArray <= 1) {
    return 0;
  }

  $sumaArrays = [];

  
  foreach ($arr as $index => $posiciones) {

    $sumaArrays[] = array_sum($arr) - $posiciones;
  }

  $min = min($sumaArrays);
  $max = max($sumaArrays);

  echo $min . " " . $max;
}

miniMaxSum([9, 1, 8, 11, 7]); */

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 * It prints the minimum and maximum values as a single line of space-separated integers.
 */

function miniMaxSum($arr)
{
  // Calculamos la suma total UNA sola vez afuera para optimizar el rendimiento
  $totalSum = array_sum($arr);
  $sumResults = [];

  foreach ($arr as $value) {
    // Tu excelente logica: restar el elemento actual a la suma total
    $sumResults[] = $totalSum - $value;
  }

  $min = min($sumResults);
  $max = max($sumResults);

  // HackerRank pide imprimir directamente el resultado separado por un espacio
  echo $min . " " . $max;
  echo "\n"; // Agregamos un salto de línea al final para cumplir con el formato de salida
  echo "Cada suma individual: " . implode(" ", $sumResults) . "\n"; // Mostramos la suma total para referencia
}

miniMaxSum([1, 2, 3, 4, 5]);
