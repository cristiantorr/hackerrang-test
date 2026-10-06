<?php

/**
 * Función para encontrar el número faltante en un arreglo de enteros consecutivos.
 *
 * @param array $arr Arreglo de enteros consecutivos con un número faltante.
 * @return int El número faltante.
 */

function findMissingNumber($arr)
{
  $n = count($arr);
  if ($n === 0) {
    return 0;
  }

  $minValue = $arr[0];
  $maxValue = $arr[0];
  $actualSum = 0;
  echo "Valor mínimo: " . $minValue . "<br>";
  echo "Valor máximo: " . $maxValue . "<br>";
  for ($i = 0; $i < $n; $i++) {
    $actualSum += $arr[$i];

    if ($arr[$i] < $minValue) {

      $minValue = $arr[$i];
      echo "array[" . $i . "]: " . $arr[$i] . " Valor mínimo: " . $minValue . "<br>";
    }
    if ($arr[$i] > $maxValue) {
      $maxValue = $arr[$i];
      echo "array[" . $i . "]: " . $arr[$i] . " Valor máximo: " . $maxValue . "<br>";
    }
  }


  $expectedSum = (($minValue + $maxValue) * ($n + 1)) / 2;
  echo "Valor mínimo: " . $minValue . "<br>";
  echo "Valor máximo: " . $maxValue . "<br>";
  echo "Número de elementos: " . $n . "<br>";
  echo "Suma esperada: " . $expectedSum . "<br>";
  echo "Suma real: " . $actualSum . "<br>";

  return $expectedSum - $actualSum;
}

// Probamos pasando correctamente el arreglo (quitamos el 3 para verificar)
$resultado = findMissingNumber([1, 2, 4, 5, 6, 7]);
echo "El numero faltante es: " . $resultado . "\n";
