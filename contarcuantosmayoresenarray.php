<?php

/**
 * Estás a cargo del pastel de cumpleaños de un niño. Tendrá una vela por cada año de su edad. Solo podrá apagar la vela más alta. Tu tarea es contar cuántas velas son las más altas.
 * 
 * Las velas más altas miden 4 unidades de altura. Hay 2 velas con esta altura, por lo que la función debería devolver 2.
 */
function birthdayCakeCandles($candles)
{

  /*  $n = count($candles);
  if ($n < 0) {
    return 0;
  }

  $maxcount = 0;
  rsort($candles);

  for ($i = 0; $i < $n; $i++) {
    if ($candles[$i] >= $candles[0]) {
      $maxcount++;
    }
  }

  return $maxcount; */

  // 1. Encontrar la altura de la vela más alta
  $maxHeight = max($candles);

  var_dump($maxHeight); // Muestra la altura máxima para depuración
  // 2. Contar la frecuencia de todas las alturas en el array
  $counts = array_count_values($candles);

  var_dump($counts); // Muestra la frecuencia de cada altura para depuración

  // 3. Retornar cuántas velas tienen esa altura máxima
  return $counts[$maxHeight];
}

echo birthdayCakeCandles([1, 3, 2, 3, 5, 5, 5]) . "\n"; // Salida: 2
