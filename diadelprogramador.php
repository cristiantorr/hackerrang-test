<?php


function dayOfProgrammer($year)
{
  // CASO 1: El año de transición exacta (1918)
  if ($year === 1918) {
    // Al perderse 13 días en febrero, el día 256 cae siempre el 26 de septiembre
    return "26.09.1918";
  }

  // CASO 2: Calendario Juliano (Antes de 1918)
  if ($year < 1918) {
    // Regla antigua: divisible por 4 es bisiesto
    if ($year % 4 === 0) {
      return "12.09." . $year; // Bisiesto
    } else {
      return "13.09." . $year; // No bisiesto
    }
  }

  // CASO 3: Calendario Gregoriano (Después de 1918)
  // Regla moderna: divisible por 400 Ó (divisible por 4 y NO por 100)
  if (($year % 400 === 0) || ($year % 4 === 0 && $year % 100 !== 0)) {
    return "12.09." . $year; // Bisiesto
  } else {
    return "13.09." . $year; // No bisiesto
  }
}


echo dayOfProgrammer(2017) . "\n"; // Salida esperada: 13.09.2017