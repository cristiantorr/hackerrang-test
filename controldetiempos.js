/**
 * @param {Promise} promise
 * @param {number} timeoutMs
 * @return {Promise}
 */
function promiseTimeout(promise, timeoutMs) {
  // Creamos una promesa que se rechaza automáticamente cuando se acaba el tiempo
  const timer = new Promise((_, reject) => {
    setTimeout(() => reject(new Error("Timeout Error")), timeoutMs);
  });

  // Promise.race ejecuta ambas y devuelve el resultado de la que termine PRIMERO
  return Promise.race([promise, timer]);
}

// --- EJEMPLO DE USO ---
const peticionLenta = new Promise((resolve) =>
  setTimeout(() => resolve("Datos cargados"), 3000),
);

promiseTimeout(peticionLenta, 2000)
  .then((res) => console.log(res))
  .catch((err) => console.error(err.message)); // Imprime: Timeout Error (porque 3s > 2s)
