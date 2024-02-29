<footer class="text-white text-center text-lg-start border border-white pt-4 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase mb-4">Nosotros</h5>
                <ul class="list-unstyled mb-4">
                    <li>
                        <a href="{{ route('aboutBeerfinder') }}">Sobre BEERFINDER</a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li>
                        <a href="{{ route('cookiesPolicy') }}">Politica de cookies</a>
                    </li>
                    <li>
                        <a href="{{ route('privacyPolicy') }}">Politica de privacidad</a>
                    </li>
                    <li>
                        <a href="{{ route('legalAdvice') }}">Aviso legal</a>
                    </li>
                    <li>
                        <a href="{{ route('consume') }}">Disfruta con responsabilidad</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase mb-4">Asistencia</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('contactLocals') }}">¿Eres una empresa? Contactanos</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUsuarios') }}">Habla con nosotros</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase mb-4">Trabaja con nosotros</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('login') }}">Inicia sesión</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Regístrate</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}">Panel de control</a>
                    </li>
                    <li>
                        <a href="#!">Oportunidades</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase mb-4">Social</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://facebook.com" hidden>Facebook</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/beerfinder.es">Instagram</a>
                    </li>
                    <li>
                        <a href="https://x.com" hidden>X</a>
                    </li>
                    <li>
                        <a href="https://tiktok.com" hidden>TikTok</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 mb-4" hidden>
                <h5 class="text-uppercase mb-4">Suscribete a nuestra newsletter</h5>
                <form class="d-flex justify-content-center">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Correo electrónico"
                            aria-label="Correo electrónico" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                            disabled>Suscribirse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center p-3 border-top border-white">
        <h3>© BEERFINDER - 2024</h3>
        <h3>Todos los derechos reservados.</h3>
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    let mybutton = document.getElementById("myBtn");
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
