<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="my-3">
            <h2>Asesoramiento Legal</h2>
            <p>Esta sección proporciona información general y no constituye asesoramiento legal.</p>
            <div class="row">
                <div class="col-lg-6">
                    <h3>Descargo de Responsabilidad</h3>
                    <p>La información proporcionada aquí es solo con fines informativos y generales. No debe
                        considerarse asesoramiento legal. Para obtener asesoramiento legal específico, se recomienda
                        consultar a un abogado calificado.</p>
                </div>
                <div class="col-lg-6">
                    <h3>Limitación de Responsabilidad</h3>
                    <p>No nos hacemos responsables de ninguna acción tomada en base a la información proporcionada en
                        BEERFINDER. Cualquier acción que tomes debe ser llevada a cabo bajo tu propia responsabilidad.
                    </p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>Consultar a un Profesional</h3>
                    <p>Es importante buscar asesoramiento legal profesional para abordar situaciones específicas. Los
                        problemas legales pueden variar y necesitan una evaluación individual para ofrecer soluciones
                        adecuadas.</p>
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
