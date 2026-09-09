# Cheat Sheet: Validacion de Casos Base (Guard Clauses) en PHP

Una **Validacion de Caso Base** (o _Guard Clause_) es un bloque de codigo al inicio de una funcion que gestiona inmediatamente los escenarios extremos (datos vacios, nulos o insuficientes). Su objetivo es detener la ejecucion antes de que el algoritmo principal cause un error critico (Fatal Error).

---

## 🚀 Reglas de Oro para HackerRank

1. **Va al inicio:** Siempre debe ser lo primero que escribas despues de contar los elementos (`count($arr)`).
2. **Previene el "Time Limit Exceeded":** Al retornar de inmediato si los datos son insuficientes, evitas bucles innecesarios.
3. **Previene el "Undefined index/key":** Evita que intentes acceder a `$arr[0]` o `$arr[1]` cuando el arreglo no tiene elementos.

---

## 📊 Matriz de Decision: ¿Que retornar segun el Enunciado?

El valor del `return` depende estrictamente del tipo de dato que el problema espera recibir. Identificalo leyendo la seccion: `* The function is expected to return a...`

| Si el problema te pide...            | Condicion del Caso Base          | Retorno Correcto                 | Motivo / Ejemplo                                              |
| :----------------------------------- | :------------------------------- | :------------------------------- | :------------------------------------------------------------ |
| **Contar** elementos                 | `if ($n === 0)` o `if ($n <= 1)` | `return 0;`                      | No hay elementos que acumular o contar en la lista.           |
| **Sumar** valores / Promedios        | `if ($n === 0)`                  | `return 0;` o `return 0.0;`      | Previene errores de division por cero (`0 / 0`).              |
| **Buscar** un elemento o ID          | `if ($n === 0)`                  | `return -1;` o `return null;`    | Indica textualmente que el objetivo no existe en el conjunto. |
| **Filtrar / Transformar** un arreglo | `if ($n === 0)`                  | `return [];`                     | HackerRank espera una estructura de arreglo, no un entero.    |
| **Validar** si todo es correcto      | `if ($n === 0)`                  | `return false;` o `return true;` | Depende del enunciado (ej: "retorne false si esta vacio").    |

---

## 💻 Ejemplos de Implementacion en ASCII

### 1. Para Contar Regresiones / Diferencias (Requiere al menos 2 elementos)

Si necesitas comparar el elemento actual con el anterior (ej. `$arr[$i] - $arr[$i-1]`), el arreglo necesita **minimo dos elementos** para poder operar.

```php
function countRegressions(\$arr) {
    \(n = count(\)arr);

    // Si tiene 0 o 1 elemento, es imposible comparar parejas. Retorna 0.
    if (\$n <= 1) {
        return 0;
    }

    // Algoritmo principal...
}
```

### 2. Para Filtrar Datos de Servidor (Espera un Arreglo de salida)

Si procesas una lista para extraer ciertos valores y la lista original viene limpia, debes retornar un contenedor vacio.

```php
function filterLogs(\$logs) {
    \(n = count(\)logs);

    // Si la entrada es un arreglo vacio, la salida obligatoriamente debe ser []
    if (\$n === 0) {
        return [];
    }

    // Algoritmo principal...
}
```

### 3. Para Busqueda de Índices (Espera un Entero de posicion)

Si buscas en que posicion se encuentra una palabra clave dentro de un arreglo.

```php
function findKeywordIndex(\(keywords,\)target) {
    \(n = count(\)keywords);

    // Si no hay datos donde buscar, devolvemos -1 (Estandar de busqueda)
    if (\$n === 0) {
        return -1;
    }

    // Algoritmo principal...
}
```

---

Método Estándar (array_unique)

Esta función toma un array y devuelve uno nuevo sin valores duplicados, manteniendo las claves originales del primer elemento encontrado.php$frutas = ['manzana', 'pera', 'manzana', 'plátano', 'pera'];
$resultado = array_unique($frutas);

print_r($resultado);

textArray
(
[0] => manzana
[1] => pera
[3] => plátano
)

---

2. Resetear los Índices NuméricosComo array_unique conserva las claves originales (por ejemplo, salta del índice 1 al 3 en el ejemplo anterior), es común querer reindexar el array para que empiece desde 0 de forma secuencial. Esto se logra envolviendo la función en array_values():php$frutas = ['manzana', 'pera', 'manzana', 'plátano', 'pera'];
$resultado = array_values(array_unique($frutas));

print_r($resultado);

textArray
(
[0] => manzana
[1] => pera
[2] => plátano
)

---

3. Caso Especial: Arrays Multidimensionales o de ObjetosSi tienes un array que contiene otros arrays (como filas de una base de datos) u objetos, array_unique() fallará o dará un error de conversión.Para conservar registros únicos basados en una clave específica (por ejemplo, el id), la forma más eficiente es indexar temporalmente por esa columna usando array_column():

$usuarios = [
['id' => 1, 'nombre' => 'Ana'],
['id' => 2, 'nombre' => 'Luis'],
['id' => 1, 'nombre' => 'Ana'], // Duplicado
];

// Al usar 'id' como segunda opción, PHP sobreescribe los duplicados usando el id como clave del array
$resultado = array_values(array_column($usuarios, null, 'id'));

print_r($resultado);

---

Método Recomendado: array_diff_assocUsamos array_diff_assoc porque compara tanto los valores como sus claves. Como array_unique elimina los elementos duplicados manteniendo solo la primera aparición, cualquier elemento que falte en el array limpio es un duplicado.php$original = ['manzana', 'pera', 'manzana', 'plátano', 'pera'];

// 1. Obtener el array limpio (mantiene las posiciones originales)
$limpio = array_unique($original);

// 2. Comparar el original con el limpio para ver cuáles se quitaron
$eliminados = array_diff_assoc($original, $limpio);

// 3. Opcional: Resetear los índices de los duplicados
$duplicados_limpios = array_values($eliminados);

print_r($duplicados_limpios);
Usa el código con precaución.Resultado:textArray
(
[0] => manzana
[1] => pera
)
