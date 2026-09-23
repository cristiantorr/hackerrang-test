<?php

function staircase($n)
{
  for ($i = 1; $i <= $n; $i++) { // Iteramos desde 1 hasta $n (inclusive) para construir cada fila de la escalera
    // Calcula cuantos espacios y cuantos '#' se necesitan en cada fila
    $hashes = str_repeat('#', $i); // Repite '#' $i veces
    $spaces = str_repeat(' ', $n - $i); // Repite ' ' (espacio) $n - $i veces


    // Imprime la línea completa seguida de un salto de línea
    echo   $spaces . $hashes . "<br>";
  }
}

staircase(6); // Salida en consola:

function staircaseuno($n)
{
  for ($i = 1; $i <= $n; $i++) {
    $hashes = str_repeat('#', $i);
    // %s inserta el string, y %{$n}s fuerza a que mida exactamente $n caracteres empujándolo a la derecha
    printf("%{$n}s<br>", $hashes);
  }
}
staircaseuno(6); // Salida en consola:


function staircasedos($n)
{
  for ($i = 1; $i <= $n; $i++) {
    $hashes = str_repeat('#', $i);
    // Rellena con espacios a la izquierda hasta que el largo total sea $n
    echo str_pad($hashes, $n, ' ', STR_PAD_LEFT) . "<br>";
  }
}
staircasedos(6); // Salida en consola:
