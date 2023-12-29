<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="my-3">
            <h2>Consumo Responsable</h2>
            <p>En BeerFinder, promovemos el consumo responsable de bebidas alcohólicas y creemos en la importancia de
                hacerlo de manera consciente y moderada.</p>

            <h3>Edad legal para consumir alcohol</h3>
            <p>Es fundamental que los visitantes de nuestro sitio web sean mayores de la edad legal para consumir
                alcohol en su país de residencia. No fomentamos ni apoyamos el consumo de alcohol por parte de menores
                de edad.</p>

            <h3>Moderación y salud</h3>
            <p>El consumo excesivo de alcohol puede ser perjudicial para la salud. Recomendamos beber con moderación y
                conocer los límites de consumo seguro. Si bebes, hazlo de forma responsable y no conduzcas bajo los
                efectos del alcohol.</p>

            <h3>Recursos y ayuda</h3>
            <p>Si necesitas ayuda o información adicional sobre el consumo responsable de alcohol, existen recursos
                disponibles. Puedes encontrar información en organizaciones especializadas en el campo de la salud y el
                bienestar relacionado con el alcohol.</p>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
