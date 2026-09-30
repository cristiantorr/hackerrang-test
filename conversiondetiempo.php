<?php


function timeConversion($s)
{
  // 1. Extraer el indicador AM o PM (los últimos 2 caracteres)
  $ampm = substr($s, -2);

  // 2. Extraer la parte del tiempo sin AM/PM (ej: "12:01:00")
  $timeWithoutAmpm = substr($s, 0, -2);

  // 3. Separar las horas, minutos y segundos usando el formato de arreglo
  $parts = explode(':', $timeWithoutAmpm);
  $hour = $parts[0];
  $minutes = $parts[1];
  $seconds = $parts[2];

  // 4. Aplicar la lógica de conversión de 12 a 24 horas
  if ($ampm === 'AM') {
    if ($hour === '12') {
      $hour = '00';
    }
  } else { // Si es PM
    if ($hour !== '12') {
      $hour = (int)$hour + 12;
    }
  }

  // 5. Unir todo asegurando que la hora tenga dos dígitos (por si acaso)
  return sprintf("%02d:%s:%s:%s", $hour, $minutes, $seconds, $ampm);
}

echo timeConversion("07:05:45PM") . "\n"; // Salida esperada: 12:01:00