document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir el envío del formulario para manejar la animación

    // Mostrar la animación de carga
    var animationContainer = document.getElementById("animationContainer");
    var loading = document.getElementById("loading");
    var checkmark = document.getElementById("checkmark");
    var successMessage = document.getElementById("successMessage");

    // Inicializar todos los elementos
    animationContainer.style.display = "block"; // Mostrar contenedor de animación
    checkmark.style.display = "none"; // Asegurarse de que el checkmark esté oculto
    successMessage.style.display = "none"; // Asegurarse de que el mensaje de éxito esté oculto

    // Simular la espera de la autenticación
    setTimeout(function() {
        loading.style.display = "none"; // Ocultar el círculo de carga
        checkmark.style.display = "block"; // Mostrar el checkmark verde
        successMessage.style.display = "block"; // Mostrar el mensaje de éxito

        // Redirigir a la página de inicio después de la animación
        setTimeout(function() {
            window.location.href = "eventos.html"; // Redirigir al usuario
        }, 2000); // 2 segundos después de la animación
    }, 3000); // 3 segundos de animación
});
