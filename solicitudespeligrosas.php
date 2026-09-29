<?php

/*
 * Complete the 'countDangerousRequests' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY timestamps as parameter.
 */

function countDangerousRequests($timestamps)
{
  $n = count($timestamps);
  if ($n <= 1) {
    return 0;
  }
  $dangerousCount = 0;

  /*  $day = $timestamps[0];
  $requestDangerous = 0;
  for ($i = 1; $i < $n; $i++) {

    $upday = $timestamps[$i] - $day;

    if ($upday < 3) {
      $requestDangerous++;
    }

    $day = $timestamps[$i];
  } */

  for ($i = 1; $i < $n; $i++) {
    // Comparamos directamente el elemento actual con el inmediatamente anterior
    $timeDifference = $timestamps[$i] - $timestamps[$i - 1];

    if ($timeDifference < 3) {
      $dangerousCount++;
    }
  }

  return $dangerousCount;
}

echo countDangerousRequests([10, 11, 15, 17, 20]);
