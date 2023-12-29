<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="my-3">
            <h1 class="display-4">Política de privacidad</h1>
            <p>En BeerFinder.es, nos preocupamos por la privacidad y la experiencia de nuestros usuarios. Queremos
                informarte que en nuestra plataforma no recopilamos información personal de ningún tipo.</p>
            <p>No almacenamos ni solicitamos nombres, direcciones de correo electrónico, números de teléfono u otra
                información identificativa de nuestros visitantes.</p>
            <p>Asimismo, no empleamos cookies ni tecnologías de seguimiento para recopilar datos sobre tus actividades
                en
                línea mientras navegas por nuestro sitio.</p>
            <p>Nuestro compromiso es brindar un entorno seguro y proteger la privacidad de todos los usuarios. Por
                tanto, no
                recopilamos ni almacenamos información personal en ningún momento.</p>
            <p>Si tienes alguna consulta o pregunta sobre nuestra política de privacidad o cualquier otro aspecto
                relacionado con BeerFinder.es, no dudes en contactarnos a través
                de nuestro
                formulario de contacto disponible en el sitio web.</p>
            <p>Agradecemos tu confianza en BeerFinder.es.</p>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
