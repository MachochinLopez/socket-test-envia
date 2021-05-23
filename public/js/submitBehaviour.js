/**
 * En este script se define el comportamiento del formulario
 * al generar una nueva petición.
 */

$(function () {
    // Al dar submit al formulario para crear una nueva guía.
    $(".new-guide__form").on("submit", function (event) {
        // Evita el submit del form que recarga la página.
        event.preventDefault();

        const feedback = $(".new-guide__feedback");
        const spinner = $(".new-guide__spinner");
        const formContainer = $(".new-guide__form-container");

        // Limpia los mensajes de feedback.
        feedback.text("");
        // Oculta el feedback.
        feedback.addClass("--hidden");
        // Agrega la clase que muestra el spinner.
        spinner.removeClass("--hidden");
        // Oculta el formulario.
        formContainer.addClass("--hidden");

        // Hace la petición por ajax.
        $.ajax({
            method: "POST",
            url: $(this).attr("action"),
        }).done(function (data) {
            // Oculta el spinner.
            spinner.addClass("--hidden");
            // Muestra el formulario.
            formContainer.removeClass("--hidden");

            // Permite manipular la respuesta.
            parsedData = JSON.parse(data);
            // Si la notificación trae un error.
            if (parsedData.meta === "error") {
                // Muestra el error en la pantalla.
                feedback.text(parsedData.error.message);
                // Muestra el feedback.
                feedback.removeClass("--hidden");
            }
        });
    });
});
