<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 * 
 * Explicación detallada de la lógicaTomemos el ejemplo que muestra HackerRank en tu pantalla:text

1 2 3
4 5 6
9 8 9

Usa el código con precaución.Aquí el tamaño de la matriz es \(n = 3\) (el ciclo for se ejecutará con $i = 0, $i = 1 e $i = 2).

Iteración 1 ($i = 0):Diagonal Principal: $arr[0][0] que vale 1.Diagonal Secundaria: $arr[0][3 - 1 - 0] \(\rightarrow \) $arr[0][2] que vale 3.

Iteración 2 ($i = 1):Diagonal Principal: $arr[1][1] que vale 5.Diagonal Secundaria: $arr[1][3 - 1 - 1] \(\rightarrow \) $arr[1][1] que vale 5.

Iteración 3 ($i = 2):Diagonal Principal: $arr[2][2] que vale 9.Diagonal Secundaria: $arr[2][3 - 1 - 2] \(\rightarrow \) $arr[2][0] que vale 9.Resultado 

Final:Suma Principal: \(1 + 5 + 9 = 15\)Suma Secundaria: \(3 + 5 + 9 = 17\)abs(15 - 17) nos da -2, pero abs() lo convierte en 2 positivo.
 */


function diagonalDifference($arr)
{
  $n = count($arr); // Obtenemos el tamaño de la matriz (filas/columnas)
  $diagonalPrincipal = 0;
  $diagonalSecundaria = 0;

  for ($i = 0; $i < $n; $i++) {
    // 1. Diagonal Principal (Izquierda a Derecha)
    // Los índices de fila y columna son iguales: [0][0], [1][1], [2][2]...
    $diagonalPrincipal += $arr[$i][$i];

    // 2. Diagonal Secundaria (Derecha a Izquierda)
    // La fila avanza ($i) pero la columna retrocede desde el final ($n - 1 - $i)
    // Ejemplo para n=3: [0][2], [1][1], [2][0]
    $diagonalSecundaria += $arr[$i][$n - 1 - $i];
  }

  // 3. Retornamos la diferencia absoluta usando la función abs()
  return abs($diagonalPrincipal - $diagonalSecundaria);
}
