<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-4 my-2">
                <div class="card shadow">
                    <img class="card-img-top img-fluid" src="images/imagen1.jpg" alt="tirador de cerveza">
                    <div class="card-body">
                        <p class="card-text">
                            La cerveza es una bebida alcohólica que ha sido parte de la cultura humana
                            durante miles de años. ¿Sabías que la cerveza primitiva era simplemente harina de cereal
                            fermentada con el
                            mismo sistema que el pan?. Además, los babilonios consideraban la cerveza como el alimento
                            más importante y el código del rey Hammurabi dictaba que debía garantizarse a todo ciudadano
                            una
                            ración diaria de cerveza como parte de la dieta base en Babilonia.
                        </p>
                        <strong>¡Salud!🍻</strong>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 my-2">
                <div class="card shadow">
                    <img class="card-img-top img-fluid" src="images/imagen2.jpg" alt="tirador de cerveza">
                    <div class="card-body">
                        <p class="card-text">
                            La cerveza, consumida con moderación, puede tener algunos beneficios para la salud.
                            Contiene
                            nutrientes beneficiosos como ácido fólico, proteínas, carbohidratos, fibra soluble, fósforo,
                            silicio, potasio y sodio. Además, un estudio concluyó que las personas que consumían cerveza
                            habitualmente de forma moderada tenían menor incidencia de diabetes mellitus e hipertensión,
                            y mayor cantidad de colesterol bueno que aquellas que no la bebían.
                        </p>
                        <strong>¡Salud!🍻</strong>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 my-2">
                <div class="card shadow">
                    <img class="card-img-top img-fluid" src="images/coldbeer.jpg" alt="tirador de cerveza">
                    <div class="card-body">
                        <p class="card-text">
                            ¿A quién no le gusta una buena cerveza fría? Según Brand Finance, la
                            mejor cerveza del mundo es Coronita, de origen mexicano. El valor de esta marca aumentó un
                            21% hasta
                            alcanzar los 7.000 millones de dólares. Heineken (neerlandesa), por su parte, ocupa el
                            segundo puesto con un aumento de su marca del 23% a 6.900 millones de dólares. Budweiser,
                            estadounidense, con una valoración de 5.600 millones, cierra el podio.
                        </p>
                        <strong>¡Salud!🍻</strong>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center my-5">
                <a href="{{ route('home') }}"><img class="rounded img-fluid" src="images/beerfinder2.gif"
                        alt="gif beerfinder">
                </a>
            </div>
        </div>

    </main>
    @include('partials.footer')
</body>

</html>
