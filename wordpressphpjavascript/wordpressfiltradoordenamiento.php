


<?php

/*
 * Ejercicio 1: PHP (Filtrado y Ordenamiento de Datos)El reto:HackerRank te entregará un arreglo bidimensional que simula una lista de posts extraídos de la base de datos de WordPress. Cada post es un arreglo asociativo con las llaves id, title, status (pueden ser 'draft', 'publish' o 'private') y views (un entero con el número de visitas).Debes escribir la lógica de una función que:Filtre el arreglo para conservar únicamente los posts que tengan el estado 'publish'.Ordene los posts filtrados de forma descendente (de mayor a menor) según sus visitas (views). Si dos posts tienen las mismas visitas, ordénalos por id de forma ascendente.
 */
function filtrarYOrdenarPosts($posts)
{
  // 1. Filtrar los posts que tengan status === 'publish'
  $postsFiltrados = array_filter($posts, function ($post) {
    return $post['status'] === 'publish';
  });

  // 2. Ordenar usando usort con una función de comparación
  usort($postsFiltrados, function ($a, $b) {
    // Si las vistas son diferentes, ordenar por vistas descendente (b - a)
    if ($b['views'] !== $a['views']) {
      return $b['views'] <=> $a['views']; // Operador spaceship (<=>) eficiente en PHP 7/8
    }
    // Si las vistas son iguales, ordenar por ID ascendente (a - b)
    return $a['id'] <=> $b['id'];
  });

  return $postsFiltrados;
}

// --- CASO DE PRUEBA SIMULADO ---
$datosEntrada = [
  ['id' => 1, 'title' => 'Post A', 'status' => 'publish', 'views' => 150],
  ['id' => 2, 'title' => 'Post B', 'status' => 'draft',   'views' => 500],
  ['id' => 3, 'title' => 'Post C', 'status' => 'publish', 'views' => 300],
  ['id' => 4, 'title' => 'Post D', 'status' => 'publish', 'views' => 150], // Mismas vistas que ID 1
];

$resultado = filtrarYOrdenarPosts($datosEntrada);
print_r($resultado); // Salida en consola: Post C, Post A, Post D

/* 
SALIDA ESPERADA:
1. Post C (300 vistas)
2. Post A (150 vistas, ID 1 va primero por ser menor)
3. Post D (150 vistas, ID 4 va después)
* Nota: Post B se elimina por ser 'draft'
*/
?>