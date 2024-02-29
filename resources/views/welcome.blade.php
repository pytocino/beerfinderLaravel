<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    <div class="modal fade" id="ageVerificationModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bg-warning">¿Eres mayor de edad?</h5>
                </div>
                <div class="modal-body">
                    <p>Para acceder a este sitio, necesitas ser mayor de edad.</p>
                    <button type="button" class="btn btn-warning" id="yesBtn">Sí</button>
                    <button type="button" class="btn btn-danger" id="noBtn" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    @include('partials.header')
    <main class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.finder')
            </div>
            <div class="text-left p-1">
                <p class="text-muted">Gracias a BEERFINDER al menos {{ formatNumber($visitCount) }} personas han
                    encontrado
                    la cerveza que estaban buscando ¡Salud! 🍻
                </p>
            </div>
        </div>
        {{-- SUGERENCIAS DE CERVEZAS --}}
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Por si no tienes muy claro que quieres...</h2>
            </div>
            @foreach ($beers as $beer)
                <div class="col-6 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($beer->image)
                                <img src="{{ Storage::url($beer->image) }}"
                                    class="card-img-top img-fluid img-thumbnail mb-2" alt="{{ $beer->name }}">
                            @else
                                <img src="images/defaultbeer.png" class="card-img-top img-fluid img-thumbnail mb-2"
                                    alt="{{ $beer->name }}">
                            @endif
                            <h5 class="card-title">{{ $beer->name }}</h5>
                            <p class="card-text">{{ $beer->graduation }}%</p>
                            {{-- <p class="card-text">{{ $beer->country }}</p> --}}
                            <form class="d-flex justify-content-center" action="{{ route('locals') }}" method="GET">
                                <input type="hidden" name="name" value="{{ $beer->name }}">
                                <button type="submit" class="btn bg-beer"><strong>ENCUENTRALA</strong> </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
    @include('partials.footer')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            if (document.cookie.indexOf('modal_visto=1') === -1) {
                let ageVerificationModal = new bootstrap.Modal(document.getElementById('ageVerificationModal'));
                ageVerificationModal.show();

                document.getElementById('yesBtn').addEventListener('click', function() {
                    ageVerificationModal.hide();
                    document.cookie = "modal_visto=1; max-age=" + 30 * 24 * 60 * 60 + "; path=/";
                });

                document.getElementById('noBtn').addEventListener('click', function() {
                    window.history.back();
                });
            }
        });
    </script>
</body>

</html>
