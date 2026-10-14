<?php

/**
 *  este ejercicio se trata de encontrar números "puente" que conecten perfectamente el grupo de números $a con el grupo de números $b.Imagina que estás construyendo un puente de un solo tamaño. El ejercicio te pide averiguar cuántos tamaños de puente diferentes existen que encajen con ambos lados.Para que un número sea ese "puente perfecto", tiene que pasar dos pruebas de división obligatorias:La prueba del lado A (Ser Múltiplo): El número que estás probando debe poder dividirse de forma exacta entre cada uno de los números del grupo $a. No puede sobrar nada (residuo cero).La prueba del lado B (Ser Divisor): Cada uno de los números del grupo $b debe poder dividirse de forma exacta entre el número que estás probando. Tampoco puede sobrar nada.
 */

function getTotalX($a, $b)
{
  // 1. 🛡️ GUARD CLAUSE (Cláusula de guarda)
  // Si alguno de los arreglos viene vacío, es imposible calcular factores. Termina de inmediato.
  if (empty($a) || empty($b)) {
    return 0;
  }

  // 2. DEFINIR EL RANGO DE BÚSQUEDA
  // El número candidato 'X' debe ser obligatoriamente:
  // - Mayor o igual al elemento más grande del arreglo $a (max($a))
  // - Menor o igual al elemento más pequeño del arreglo $b (min($b))
  $inicioRango = max($a);
  $finRango = min($b);

  // Contador para llevar el registro de cuántos números cumplen ambas condiciones
  $numerosValidos = 0;

  // 3. CICLO PRINCIPAL (Explorar todos los números posibles)
  // Evaluamos uno por uno cada número entero dentro de nuestro rango establecido
  for ($x = $inicioRango; $x <= $finRango; $x++) {

    // Bandera lógica: asumimos que el número $x es válido hasta que se demuestre lo contrario
    $cumpleCondicionA = true;

    // --- EVALUAR CONDICIÓN 1 ---
    // Todos los elementos de $a deben dividir exactamente a $x ($x debe ser múltiplo de ellos)
    foreach ($a as $elementoA) {
      if ($x % $elementoA !== 0) {
        // Si encontramos un solo número que no lo divida exacto, $x ya no sirve
        $cumpleCondicionA = false;
        break; // Rompemos este foreach interno para ahorrar tiempo
      }
    }

    // Si no cumplió la primera condición, no tiene sentido evaluar la segunda.
    // Saltamos de inmediato al siguiente número del ciclo 'for'
    if (!$cumpleCondicionA) {
      continue;
    }

    // --- EVALUAR CONDICIÓN 2 ---
    // El número $x debe dividir exactamente a todos los elementos de $b (es factor de ellos)
    $cumpleCondicionB = true;
    foreach ($b as $elementoB) {
      if ($elementoB % $x !== 0) {
        // Si $x no divide exactamente a algún elemento de $b, queda descartado
        $cumpleCondicionB = false;
        break; // Rompemos el foreach
      }
    }

    // 4. CONTABILIZAR EL NÚMERO
    // Si llegó hasta aquí y mantuvo ambas condiciones en 'true', encontramos un número puente válido
    if ($cumpleCondicionB) {
      $numerosValidos++;
    }
  }

  // 5. RETORNAR EL RESULTADO
  // Devolvemos el total de números que superaron todos los filtros
  return $numerosValidos;
}

echo getTotalX([2, 4], [16, 32, 96]); // Salida esperada: 3