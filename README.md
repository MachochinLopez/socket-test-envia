<p align="center"><img src="https://envia.com/assets/images/favicon/android-chrome-384x384.png?v=1621637834" width="200"></p>

## Proyecto Socket Test Envía.com

Esta aplicación desarrollada con Laravel y Pusher consiste en un contador en tiempo real hecho con websockets que cuenta la cantidad de guías generadas en el mes actual.
Para poder incrementar la cantidad de guías se deberá presionar el botón de "CREATE", el cuál generará una nueva guía a través de la api-test de envia.com. Al crearse esta guía, todos los clientes que estén conectados a la aplicación verán actualizada en tiempo real la cantidad de guías creadas en el mes actual.

La guía que se genera está hecha con el body de ejemplo que presenta la <a href="https://docs.envia.com/?version=latest#a6ae2f8a-eb4b-4ae9-b122-98cec67271ac">documentación de la API de Envía.com</a>. La guía se genera en mi cuenta personal de api-test, donde ya tengo varias guías que generé durante el desarrollo del proyecto.

## Live Demo

La aplicación se desplegó en heroku y puede verse a través de la siguiente liga: https://socket-test-envia.herokuapp.com/
