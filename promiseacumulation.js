/**
 *
 * async function*: El asterisco * define que esta es una función generadora, lo que significa que puede pausar su ejecución y "devolver" múltiples valores uno a uno a lo largo del tiempo usando la palabra yield. Al combinarse con async, se convierte en un generador asíncrono, permitiéndole pausar el código mientras espera promesas usando await.
 */
async function* promiseAccumulation(promiseArr) {
  for (const promise of promiseArr) {
    //for...of: Es un bucle que recorre el arreglo promiseArr elemento por elemento de forma secuencial. En cada vuelta, toma una promesa y la guarda temporalmente en la variable promise.
    try {
      //try: Inicia un bloque de protección. JavaScript intentará ejecutar el código que está aquí adentro. Si alguna promesa falla (se rechaza), el código no romperá la aplicación, sino que saltará de inmediato a la sección catch.
      // Esperamos a que la promesa se resuelva
      const result = await promise; // Detiene temporalmente la ejecución del bucle en esta línea y espera pacientemente a que la promesa actual termine de procesarse con éxito.
      //const result =: Una vez que la promesa se resuelve de manera exitosa, el valor real que contenía esa promesa se extrae y se guarda en la variable result.

      yield result; //Es la instrucción que "emite" o entrega el valor de result hacia el código externo que llamó al generador. Lo genial de yield es que, a diferencia de un return, no termina la función; simplemente congela el estado de la función en esta línea exacta hasta que el programa le pida el siguiente valor.
    } catch (error) {
      ///catch (error): Este bloque solo se activa si la promesa evaluada en el try falló o fue rechazada (un reject). La variable error guarda el motivo del fallo.
      // Si es rechazada, emitimos -1 y terminamos el generador inmediatamente
      yield -1; //yield -1: Tal como lo piden los requisitos de HackerRank, si una promesa falla, el generador debe emitir el número -1 hacia el exterior.
      return; //return: A diferencia de yield, la palabra return termina por completo la ejecución de la función. Al ponerse aquí, asegura que el generador se detenga de inmediato tras el primer fallo, impidiendo que el bucle for siga avanzando con las promesas restantes del arreglo.
    }
  }
}
