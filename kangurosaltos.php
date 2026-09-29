<?php

/**
 * Quitar el límite fijo de 4 saltos.Revisar en cada salto: Debes verificar si están en la misma posición dentro del ciclo, no al final.Condición de parada: Como el canguro 1 empieza atrás ($x1 < $x2), si en algún momento el canguro 1 supera al canguro 2 ($canguro1position > $canguro2position), significa que ya lo pasó de largo y nunca más se van a encontrar. Ahí debes detener el ciclo.
 */

function kangaroo($x1, $v1, $x2, $v2)
{
  $canguro1position = $x1;
  $canguro2position = $x2;

  // Si el canguro 1 es más lento o tiene la misma velocidad, 
  // nunca alcanzará al canguro 2 (porque el 2 empieza adelante).
  if ($v1 <= $v2) {
    return "NO";
  }

  // Mientras el canguro 1 no haya pasado al canguro 2, seguimos simulando saltos
  while ($canguro1position < $canguro2position) {
    $canguro1position += $v1;
    $canguro2position += $v2;

    // ¡Revisamos EN CADA SALTO si se encontraron!
    if ($canguro1position === $canguro2position) {
      return "YES"; // Se encontraron, terminamos la función inmediatamente
    }
  }

  // Si el ciclo terminó y nunca entró al IF de arriba, es porque lo pasó de largo
  return "NO";
}

echo kangaroo(0, 3, 4, 2); // Salida esperada: "YES"