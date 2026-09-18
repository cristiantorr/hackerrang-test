<?php

function reverseArray($a)
{
  // Write your code here
  /*  $n = count($a);
  if (count($a) <= 1) {
    return [];
  };
  $newArray = []; // nuevo array con los numeros al revez
  for ($i = $n - 1; $i >= 0; $i--) {
    $newArray[] = $a[$i];
  }

  return $newArray; */

  $resultado = array_reverse($a);

  return $resultado;
}

echo implode(" ", reverseArray([1, 2, 3, 8, 5]));
