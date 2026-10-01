
<?php

function sumarColumna($arr, $columnaDeseada)
{
  $n = count($arr); // Número de filas
  $suma = 0;

  for ($i = 0; $i < $n; $i++) {
    // La fila ($i) cambia en cada vuelta: 0, 1, 2...
    // La columna ($columnaDeseada) se mantiene fija.
    $suma += $arr[$i][$columnaDeseada];
  }

  return $suma;
}

// --- Ejemplo de uso ---
$matriz = [
  [1, 5, 3],
  [2, 5, 5],
  [9, 8, 9]
];

// Si queremos sumar la columna del centro (índice 1): [0][1] + [1][1] + [2][1]
// Esto sumará: 2 + 5 + 8=15
echo sumarColumna($matriz, 1) . "<br>"; // Salida: 18


function sumarFila($arr, $filaDeseada)
{
  // Obtenemos cuántas columnas tiene esa fila específica
  $totalColumnas = count($arr[$filaDeseada]);
  $suma = 0;

  for ($j = 0; $j < $totalColumnas; $j++) {
    // La fila ($filaDeseada) se mantiene fija.
    // La columna ($j) cambia en cada vuelta: 0, 1, 2...
    $suma += $arr[$filaDeseada][$j];
  }

  return $suma;
}

// --- Ejemplo de uso ---
$matriz = [
  [1, 5, 3],
  [2, 5, 5],
  [9, 8, 9] //fila
];

// Si queremos sumar la última fila (índice 2): [2][0] + [2][1] + [2][2]
// Esto sumará: 9 + 8 + 9 = 26
echo sumarFila($matriz, 2); // Salida: 26