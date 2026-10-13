<?php

/**
 * Función para contar cuántos elementos en un arreglo son mayores al promedio de los elementos anteriores.
 *
 * @param array $tiempos_de_respuesta Arreglo de tiempos de respuesta.
 * @return int Cantidad de elementos mayores al promedio de los elementos anteriores.
 */

function contarMayoresAlPromedioAnterior($tiempos_de_respuesta)
{
  $n = count($tiempos_de_respuesta);
  if ($n <= 1) {
    return 0;
  }

  $contador = 0;
  $suma_acumulada = $tiempos_de_respuesta[0];
  echo "suma acumulada: " . $suma_acumulada . "<br>";

  for ($i = 1; $i < $n; $i++) {
    $promedio_anterior = $suma_acumulada / $i;
    echo "promedio anterior: " . $promedio_anterior . " variable i " . $i . "<br>";

    if ($tiempos_de_respuesta[$i] > $promedio_anterior) {
      $contador++;
    }
    echo "tiempos de respuesta: " . $tiempos_de_respuesta[$i] . "<br>";
    echo "contador actual: " . $contador . "<br>";

    // Sumamos el elemento actual para el cálculo del siguiente ciclo
    $suma_acumulada += $tiempos_de_respuesta[$i];
    echo "suma acumulada actualizada: " . $suma_acumulada . "<br>";
  }

  return $contador;
}

// Prueba del ejemplo
echo contarMayoresAlPromedioAnterior([100, 200, 150, 300]); // Salida: 2
