<?php

/*
 * roblem Statement:In WordPress, multiple plugins can attach functions to the same hook (like the_content) using different priorities. If multiple functions share the exact same priority, a conflict occurs, and the system might behave unpredictably.You are given an array of associative arrays ($plugins). Each element in the array represents a plugin function registration and contains three keys:"name" (string): The unique name of the plugin."hook" (string): The name of the WordPress hook (e.g., "the_content", "wp_head")."priority" (integer): The execution priority (lower numbers run first).
 * INPUT : $plugins = [
    ["name" => "SEOPlugin",    "hook" => "wp_head",     "priority" => 10],
    ["name" => "CachePlugin",  "hook" => "wp_head",     "priority" => 10], // Conflict on wp_head (10)
    ["name" => "SocialPlugin", "hook" => "the_content", "priority" => 20],
    ["name" => "AdsPlugin",    "hook" => "the_content", "priority" => 20], // Conflict on the_content (20)
    ["name" => "Security",     "hook" => "wp_head",     "priority" => 5]
];
  * OUTPUT : [10, 20]
 */

function findHookConflicts($plugins)
{
  if (count($plugins) === 0) {
    return [];
  }

  $counts = [];
  $conflicts = [];

  // Paso 1: Contar cuantas veces aparece cada combinacion de hook + priority
  foreach ($plugins as $plugin) {
    $key = $plugin["hook"] . "_" . $plugin["priority"];

    // Si no existe la combinacion, la inicializamos en 0
    if (!isset($counts[$key])) {
      $counts[$key] = 0;
    }
    $counts[$key]++;

    // Si aparece mas de una vez, guardamos la prioridad como conflicto
    if ($counts[$key] === 2) {
      $conflicts[] = $plugin["priority"];
    }
  }

  // Paso 2: El enunciado pide que el resultado este ordenado de menor a mayor
  sort($conflicts);

  // Paso 3: Usamos array_unique por si una misma prioridad genera multiples conflictos
  return array_values(array_unique($conflicts));
}

// --- CASO DE PRUEBA ---
$retur = findHookConflicts([
  ["name" => "SEOPlugin",    "hook" => "wp_head",     "priority" => 10],
  ["name" => "CachePlugin",  "hook" => "wp_head",     "priority" => 10], // Conflicto real (10)
  ["name" => "SocialPlugin", "hook" => "the_content", "priority" => 20],
  ["name" => "AdsPlugin",    "hook" => "the_content", "priority" => 20], // Conflicto real (20)
  ["name" => "Security",     "hook" => "wp_head",     "priority" => 5]
]);

echo implode(", ", $retur); // Salida en consola: 10, 20
