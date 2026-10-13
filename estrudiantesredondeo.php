<?php

function gradingStudents($grades)
{
  // Si la lista está vacía o tiene un solo elemento según tu validación inicial
  if (count($grades) < 1) {
    return [];
  }

  $newGrades = [];

  foreach ($grades as $grade) {
    // Regla de HackerRank: Las notas menores a 38 no se redondean (siguen siendo reprobatorias)
    if ($grade < 38) {
      $newGrades[] = $grade;
      continue; // Salta a la siguiente nota
    }

    $residuo = $grade % 5;
    $faltanteParaSiguiente = 5 - $residuo;

    // Si el residuo es 0, significa que YA es múltiplo de 5 (el faltante sería 5, no se redondea)
    if ($residuo !== 0 && $faltanteParaSiguiente < 3) {
      // Si falta menos de 3 para el siguiente múltiplo, se redondea hacia arriba
      $newGrades[] = $grade + $faltanteParaSiguiente;
    } else {
      // Si no cumple (ej: falta 3 o 4, o ya es múltiplo), se queda igual
      $newGrades[] = $grade;
    }
  }

  return implode(', ', $newGrades);
}

echo gradingStudents([73, 67, 38, 33]); // Salida esperada: [75, 67, 40, 33]
