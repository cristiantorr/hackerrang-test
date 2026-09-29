<?php

function countApplesAndOranges($s, $t, $a, $b, $apples, $oranges)
{
  $appleCount = 0;
  $orangeCount = 0;

  // 1. Procesar cada manzana
  foreach ($apples as $appleDistance) {
    $finalPosition = $a + $appleDistance;
    var_dump("posición manzana: " . $finalPosition . "<br>"); // Depuración: mostrar la posición final de cada manzana
    // Verificar si cayó dentro del rango de la casa [s, t]
    if ($finalPosition >= $s && $finalPosition <= $t) {
      $appleCount++;
    }
  }

  // 2. Procesar cada naranja
  foreach ($oranges as $orangeDistance) {
    $finalPosition = $b + $orangeDistance;
    var_dump("posición naranja: " . $finalPosition . "<br>"); // Depuración: mostrar la posición final de cada naranja
    // Verificar si cayó dentro del rango de la casa [s, t]
    if ($finalPosition >= $s && $finalPosition <= $t) {
      $orangeCount++;
    }
  }

  // 3. Imprimir los resultados uno por línea como pide el reto
  echo $appleCount . "\n";
  echo $orangeCount . "\n";
}

// 2. Mapeamos los datos del Sample Input 0 a variables de PHP

// Primera línea: 7 11 (Inicio y fin de la casa)
$s = 7;
$t = 11;

// Segunda línea: 5 15 (Posición de árbol de manzanas y naranjas)
$a = 5; // Posición del árbol de manzanas
$b = 15; // Posición del árbol de naranjas

// Tercera línea: 3 2 (Cantidad de manzanas y naranjas en los arreglos. No se usa directamente en PHP)

// Cuarta línea: -2 2 1 (Las distancias de las manzanas)
$apples = [3, 3, 2];

// Quinta línea: 5 -6 (Las distancias de las naranjas)
$oranges = [1, -6];


// 3. Ejecutamos la función pasando las variables
countApplesAndOranges($s, $t, $a, $b, $apples, $oranges);
