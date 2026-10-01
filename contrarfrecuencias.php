<?php


function migratoryBirds($arr)
{

  if (empty($arr)) return 0;

  // 1. Contar frecuencias. Ej: [1, 4, 4, 4, 5, 3] -> [4 => 3, 1 => 1, 5 => 1, 3 => 1]
  $frecuencias = array_count_values($arr);

  $maxFrecuencia = 0;
  $idResultado = 0;

  // 2. Recorrer obteniendo el ID ($id) y su frecuencia ($frecuencia)
  foreach ($frecuencias as $id => $frecuencia) {
    // Si encontramos una frecuencia mayor OR una frecuencia igual pero con un ID menor
    if ($frecuencia > $maxFrecuencia || ($frecuencia === $maxFrecuencia && $id < $idResultado)) {
      $maxFrecuencia = $frecuencia;
      $idResultado = $id;
    }
  }

  return $idResultado;
}

echo migratoryBirds([1, 4, 4, 4, 3, 3, 3, 2]) . "\n"; // Salida esperada: 4