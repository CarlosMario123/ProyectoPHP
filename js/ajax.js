// Selecciona todos los elementos del DOM que tienen la clase .FormularioAjax

const formularios_ajax = document.querySelectorAll(".FormularioAjax");

// Función que maneja el envío del formulario
function enviar_formulario_ajax(e) {
    e.preventDefault(); // Evita el envío predeterminado del formulario

    // Muestra una ventana de confirmación al usuario
    let enviar = confirm("Quieres enviar el formulario");

    if (enviar == true) { // Si el usuario confirma enviar el formulario
        // Obtiene los datos del formulario actual
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        let encabezados = new Headers(); // Crea un objeto Headers vacío

        // Configuración para la solicitud Fetch
        let config = {
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        // Realiza una solicitud Fetch al servidor
        fetch(action, config)
            .then(respuesta => respuesta.text()) // Convierte la respuesta a texto
            .then(respuesta => { 
                // Actualiza el contenido del contenedor con clase .form-rest
                //osea como imprimir el resultado
                let contenedor = document.querySelector(".form-rest");
                contenedor.innerHTML = respuesta;
            });
    }
}

// Agrega un event listener submit a cada formulario seleccionado
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});
