<!DOCTYPE html>
<html>

<head>
    <title>Realtime Counter</title>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Pusher -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        // Inicialización Pusher.
        const pusher = new Pusher('4754e68b02307f510c1a', {
            cluster: 'us2'
        });

        // Conexión al web socket
        let channel = pusher.subscribe('notifications');
        channel.bind('guide-notification', function(data) {
            // Si la notificación actualiza el contador...
            if (data.guidesCounter) {
                // Sobreescribe el contador.
                $('.counter__value').text(data.guidesCounter);
            }
        });
    </script>
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/counter-styles.css') }}">
</head>

<body>
    <div class="counter">
        <p class="counter__month">Guides created on {{ date('M Y', time()) }}</p>
        <img class="counter__logo" src="https://envia.com/assets/images/favicon/android-chrome-384x384.png?v=1621637834" alt="Envia logo">
        <p class="counter__value">
            {{ $guidesAmount }}
        </p>
    </div>
    <div class="new-guide">
        <div class="new-guide__spinner spinner-border --hidden" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="new-guide__form-container">
            <p class="new-guide__feedback alert alert-danger --hidden"></p>
            <p class="new-guide__title">Create new guide</p>
            <form class="new-guide__form" action="{{ route('create_shipment') }}" method="POST" onsubmit="">
                <button class="new-guide__submit">Create</button>
            </form>
        </div>
    </div>
</body>

<script src="{{ asset('js/submitBehaviour.js') }}"></script>

</html>