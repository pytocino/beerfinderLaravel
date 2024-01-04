<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="my-3">
            <p>Gracias por tu interés en contactar con nosotros. Estamos encantados de escucharte y responder a
                cualquier consulta que tengas. Por favor, completa el formulario a continuación y nos pondremos en
                contacto contigo lo antes posible.</p>
            <form action="{{ action([App\Http\Controllers\ContactController::class, 'sendLocalEmail']) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">Ingresa tu nombre completo.</div>
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
                <button type="submit" class="btn btn-primary" disabled>Enviar</button>
            </form>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
