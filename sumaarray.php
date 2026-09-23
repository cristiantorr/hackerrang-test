<?php

/*
 * Complete the 'simpleArraySum' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY ar as parameter.
 */

/* function simpleArraySum($ar) {
    $total = 0;
    
    foreach ($ar as $numero) {
        $total += $numero;
    }
    
    return $total;
} */
function simpleArraySum($ar)
{
  return array_sum($ar);
}

echo simpleArraySum([1, 2, 3, 4, 10]); // Salida en consola: 31