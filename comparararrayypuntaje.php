<?php

/*
 * Complete the 'compareTriplets' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */
/* 
function compareTriplets($a, $b) {
  $aliceArray = $a;
  $bobArray = $b;
if(count($aliceArray) < 0  || count($bobArray) < 0) {
  return null;
}
$count = 3;
$alicePoints = 0;
$bobPoints = 0;
$ceropoint = 0;
$arrayPoints = [];
for($i = 0; $i < $count; $i ++) {
  if($aliceArray[$i] > $bobArray[$i]){
    $alicePoints = $alicePoints + 1;
    
    $arrayPoints[0] = $alicePoints;
  }
  
  if($aliceArray[$i] < $bobArray[$i]){
        $bobPoints = $bobPoints + 1;

    $arrayPoints[1] = $bobPoints;
  }
  
  $ceropoint += 1;
  
}
rsort($arrayPoints);
return $arrayPoints;
} */

function compareTriplets($a, $b)
{
  $alicePoints = 0;
  $bobPoints = 0;

  // Comparamos cada una de las 3 posiciones fijas
  for ($i = 0; $i < 3; $i++) {
    if ($a[$i] > $b[$i]) {
      $alicePoints++;
    } elseif ($a[$i] < $b[$i]) {
      $bobPoints++;
    }
    // Si son iguales, ninguno suma puntos
  }

  // El problema de HackerRank exige retornar estrictamente [puntos_alice, puntos_bob]
  return [$alicePoints, $bobPoints];
}
