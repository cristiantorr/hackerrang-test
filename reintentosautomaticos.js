/**
 * @param {Function} fn - Función que retorna una promesa
 * @param {number} retries - Número máximo de reintentos
 * @return {Promise}
 */
async function promiseRetry(fn, retries) {
  let ultimoError;

  // Ejecutamos el bucle la cantidad de intentos permitidos (+1 por la ejecución inicial)
  for (let i = 0; i <= retries; i++) {
    try {
      // Intentamos resolver la promesa devuelta por la función
      return await fn();
    } catch (error) {
      ultimoError = error;
      // Si quedan intentos, el bucle continuará a la siguiente iteración (reintento)
      console.log(`Intento fallido. Reintentos restantes: ${retries - i}`);
    }
  }

  // Si salimos del bucle es porque todos los intentos fallaron
  throw ultimoError;
}

// --- EJEMPLO DE USO ---
let intentos = 0;
const apiInestable = () =>
  new Promise((resolve, reject) => {
    intentos++;
    intentos === 3
      ? resolve("¡Conectado con éxito!")
      : reject("Error de Red 503");
  });

// Intentará 3 veces. Fallará el intento 1 y 2, pero funcionará en el 3.
promiseRetry(apiInestable, 3)
  .then((res) => console.log(res)) // Imprime: ¡Conectado con éxito!
  .catch((err) => console.error("Falló definitivamente:", err));
