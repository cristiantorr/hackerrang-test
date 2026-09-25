<?php

/**
 * Descripción del reto:HackerRank suele evaluar patrones de diseño estructurales (como Pipeline o Chain of Responsibility), muy utilizados para limpiar datos antes de insertarlos en bases de datos. Debes completar la clase DataSanitizer que extiende de una clase abstracta. Debe procesar un string a través de una serie de filtros almacenados en un arreglo interno y, al usar el método mágico __invoke(), retornar el texto completamente limpio.
 */

// Clase abstracta provista por la plataforma
abstract class AbstractSanitizer
{
  protected array $filters = [];
  abstract public function addFilter(callable $filter): void;
}

// Tu solución para el examen:
class DataSanitizer extends AbstractSanitizer
{

  // Registra un nuevo filtro en el arreglo de tuberías
  public function addFilter(callable $filter): void
  {
    $this->filters[] = $filter;
  }

  // El método mágico __invoke permite ejecutar el objeto directamente como una función: $sanitizer($texto)
  public function __invoke(string $inputData): string
  {
    $cleanedData = $inputData;

    // Pasamos el texto secuencialmente por cada filtro registrado
    foreach ($this->filters as $filter) {
      $cleanedData = $filter($cleanedData);
    }

    return $cleanedData;
  }
}

// --- EJEMPLO DE USO (HackerRank Evaluador) ---
$sanitizer = new DataSanitizer();

// Filtro 1: Eliminar espacios en blanco extras
$sanitizer->addFilter('trim');

// Filtro 2: Sanitizar strings eliminando etiquetas HTML (Estilo WordPress)
$sanitizer->addFilter(function ($text) {
  return strip_tags($text);
});

// Filtro 3: Forzar minúsculas
$sanitizer->addFilter('strtolower');

// Al invocar el objeto directamente, ejecuta toda la cadena de limpieza
$resultado = $sanitizer("  <h1>Hola Mundo de PHP!</h1>   ");
echo "'$resultado'"; // Imprime: 'hola mundo de php!'
