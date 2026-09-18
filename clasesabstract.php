<?php


// Nota: La clase AbstractCipher ya viene definida por la plataforma, 
// tú solo debes escribir la clase Cipher debajo.

class Cipher extends AbstractCipher
{
  // Definimos las propiedades protegidas para que coincidan con el print_r
  protected $record;
  protected $matrix;

  // Implementamos el constructor obligatorio
  public function __construct(string $record, array $matrix)
  {
    $this->record = $record;
    $this->matrix = $matrix;
  }

  // Método mágico fundamental para convertir el objeto a string automáticamente
  // cuando se usa como llave de un array o en funciones de salida
  public function __toString()
  {
    $enciphered = '';
    $length = strlen($this->record);

    // Recorremos cada carácter de la cadena original
    for ($i = 0; $i < $length; $i++) {
      $char = $this->record[$i];

      // Si el carácter existe como llave en la matriz, lo reemplazamos
      if (isset($this->matrix[$char])) {
        $enciphered .= $this->matrix[$char];
      } else {
        $enciphered .= $char;
      }
    }

    return $enciphered;
  }
}
