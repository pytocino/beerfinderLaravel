<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="my-3">
            <h1 class="text-center">Contáctanos</h1>
            <p>¡Hola! En BeerFinder, valoramos mucho tu opinión y estamos aquí para ayudarte. Si tienes preguntas,
                comentarios o sugerencias sobre nuestra aplicación, no dudes en ponerte en contacto con nosotros.
                Completa el formulario a continuación y estaremos encantados de atenderte.</p>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">Por favor, dinos tu nombre.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Ingresa tu correo electrónico.</div>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
