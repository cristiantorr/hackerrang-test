<?php

function getRemovableIndices($str1, $str2)
{

  //Obtiene las longitudes de ambas cadenas para controlar los límites de iteración.
  $n1 = strlen($str1);
  $n2 = strlen($str2);

  //Buscar la primera diferencia por la izquierda ($LEFT)
  //Recorre ambas cadenas desde el inicio (índice 0).
  //Al encontrar el primer carácter donde no coinciden, guarda esa posición en $LEFT. Ese es el punto donde comienza la divergencia.
  $LEFT = 0;
  while ($LEFT < $n2 && $str1[$LEFT] === $str2[$LEFT]) {
    $LEFT++;
  }

  //3. Buscar la primera diferencia por la derecha ($r)
  //Recorre ambas cadenas desde el final hacia atrás.
  //La variable $r almacena el índice en str1 hasta el cual los caracteres coinciden desde la derecha.
  $RIGHT = $n1 - 1;
  $p2 = $n2 - 1;
  while ($p2 >= 0 && $str1[$RIGHT] === $str2[$p2]) {
    $RIGHT--;
    $p2--;
  }

  //4. Validar si la transformación es posible
  //Compara los límites encontrados por la izquierda ($LEFT) y por la derecha ($RIGHT).
  //Si $LEFT < $RIGHT, significa que las diferencias abarcan más de un carácter, por lo que no es posible igualar las cadenas eliminando una sola letra. Devuelve [-1].
  if ($LEFT < $RIGHT) {
    return [-1];
  }

  //5. Expandir el rango de caracteres repetidos
  //Si eliminar un carácter funciona, borrar cualquiera de sus repeticiones continuas produce el mismo resultado exacto (por ejemplo, en "sbdggggds", remover cualquier 'g' del bloque produce "sbdggds").
  //A la izquierda: Resta a $start mientras el carácter anterior sea igual al eliminado ($targetChar).
  //A la derecha: Suma a $end mientras el carácter siguiente sea igual.
  $targetChar = $str1[$LEFT];

  $start = $LEFT;
  while ($start > 0 && $str1[$start - 1] === $targetChar) {
    $start--;
  }

  $end = $LEFT;
  while ($end < $n1 - 1 && $str1[$end + 1] === $targetChar) {
    $end++;
  }

  return range($start, $end);
}

$str1 = "sbdggggdse";
$str2 = "sbdggds";

$result = getRemovableIndices($str1, $str2);
print_r($result);
