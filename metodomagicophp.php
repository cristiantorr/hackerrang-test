<?php

/**
 * Descripción del reto:En el desarrollo de plugins o temas de WordPress, es común manejar objetos de configuración. Debes implementar una clase llamada ConfigStorage que implemente la interfaz ArrayAccess y use el método mágico __get y __set. El objetivo es que el objeto permita acceder y modificar sus valores tanto en formato de objeto ($config->db_name) como en formato de arreglo ($config['db_name']).
 */

class ConfigStorage implements ArrayAccess
{
  // Array interno privado para almacenar los datos de configuración
  private array $settings = [];

  // 1. MÉTODOS MÁGICOS (Acceso tipo Objeto: $obj->clave)
  public function __set(string $key, $value): void
  {
    $this->settings[$key] = $value;
  }

  public function __get(string $key)
  {
    return $this->settings[$key] ?? null;
  }

  // 2. MÉTODOS DE ARRAYACCESS (Acceso tipo Arreglo: $obj['clave'])
  public function offsetSet($offset, $value): void
  {
    if (!is_null($offset)) {
      $this->settings[$offset] = $value;
    }
  }

  public function offsetExists($offset): bool
  {
    return isset($this->settings[$offset]);
  }

  public function offsetUnset($offset): void
  {
    unset($this->settings[$offset]);
  }

  public function offsetGet($offset): mixed
  {
    return $this->settings[$offset] ?? null;
  }
}

// --- EJEMPLO DE USO (HackerRank Evaluador) ---
$config = new ConfigStorage();

// Funciona como objeto
$config->site_url = "https://miweb.com";

// Funciona como arreglo gracias a ArrayAccess
$config['db_user'] = "root";

echo $config['site_url'] . "\n"; // Imprime: https://miweb.com
echo $config->db_user . "\n";     // Imprime: root
