<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="my-3">
            <h2>Política de Cookies</h2>
            <p>En BeerFinder, utilizamos cookies para mejorar tu experiencia mientras navegas por nuestro sitio web.</p>

            <h3>¿Qué son las cookies?</h3>
            <p>Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio
                web. Estos archivos contienen información que se utiliza para recordar tus preferencias, mejorar la
                funcionalidad del sitio y proporcionar datos anónimos a los propietarios del sitio.</p>

            <h3>¿Cómo utilizamos las cookies?</h3>
            <p>Utilizamos cookies para recopilar información sobre cómo interactúas con nuestro sitio web. Esto incluye
                datos como las páginas que visitas, el tiempo que pasas en nuestro sitio y las acciones que realizas.
                Esta información nos ayuda a entender mejor a nuestros usuarios y mejorar continuamente la experiencia
                del usuario.</p>

            <h3>Control de cookies</h3>
            <p>Tienes la opción de controlar o eliminar las cookies según tus preferencias. Puedes modificar la
                configuración de tu navegador para rechazar todas las cookies o para indicar cuándo se está enviando una
                cookie. Sin embargo, ten en cuenta que algunas partes de nuestro sitio pueden no funcionar correctamente
                si deshabilitas las cookies.</p>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
