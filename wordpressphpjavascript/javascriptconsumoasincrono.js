Ejercicio 2: JavaScript (Consumo Asíncrono de API con Fetch)El reto:Debes completar una función asíncrona que consuma una URL (un endpoint simulado de la WP REST API). La función debe:Hacer la petición usando fetch.Verificar si la respuesta de la red fue exitosa (response.ok). Si no lo es, debe retornar la cadena "Error de API".Si es exitosa, transformar la respuesta a JSON, extraer únicamente los títulos (title.rendered) de los posts y retornar un arreglo con esos títulos en texto plano.


javascript/**
 * Función asíncrona 'obtenerTitulosPosts'
 * @param {string} url - La URL del endpoint de la API.
 * @return {Promise<Array|string>} - Promesa que resuelve a un arreglo de strings o mensaje de error.
 */
async function obtenerTitulosPosts(url) {
    try {
        // 1. Realizar la petición HTTP
        const respuesta = await fetch(url);
        
        // 2. Validar si el estado HTTP es exitoso (códigos 200-299)
        if (!respuesta.ok) {
            return "Error de API";
        }
        
        // 3. Parsear el cuerpo de la respuesta a JSON
        const posts = await respuesta.json();
        
        // 4. Mapear el arreglo para extraer solo el texto del título
        // En la WP REST API, el título suele venir estructurado como: title: { rendered: "Texto" }
        return posts.map(post => post.title.rendered);

    } catch (error) {
        // Captura errores de red (ej. sin internet o URL inválida)
        return "Error de API";
    }
}

// --- CASO DE PRUEBA SIMULADO ---
// Simulamos una respuesta típica de WordPress REST API
const urlFicticia = "https://misitio.com";

// Nota: En HackerRank evaluarían esto internamente usando promesas .then()
obtenerTitulosPosts(urlFicticia).then(resultado => {
    console.log(resultado);
});