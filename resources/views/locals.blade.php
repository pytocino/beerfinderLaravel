<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<script>
    let locales = @json($locals);
</script>

<body>
    @include('partials.header')
    <main class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h1 class="text-center my-3">{{ request('name') }}</h1>
            </div>
        </div>
        <div class="row">
            @if (count($locals) === 0)
                <div class="col-12">
                    <div class="modal fade" id="autoShowModal" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered text-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-bg-warning">Por el momento no sabemos donde sirven
                                        {{ request('name') }} 🍺😢</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Pero no te preocupes, pronto sabremos donde encontrarla... Estamos en una
                                        búsqueda
                                        frenética de nuevos lugares con las
                                        mejores cervezas. 🌐
                                    </p>
                                </div>
                                <div class="modal-footer text-center">
                                    <a href="{{ route('home') }}" class="btn btn-warning btn-md">¡Busca otra
                                        cerveza!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($locals as $local)
                        @if ($local->verified)
                            <div class="col-12 col-md-3 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="h3 mb-3 d-flex align-items-center">
                                            <span>{{ $local->name }}</span>
                                            @if ($local->verified)
                                                <img src="images/verificado.png" alt="icono de verificado"
                                                    class="ml-2">
                                            @endif
                                        </div>
                                        <p class="card-text">{{ $local->type }}</p>
                                        @if ($local->phone || ($local->type === 'Restaurante' && ($local->website || $local->email)))
                                            <h6>Contacto</h6>
                                            <p class="card-text">{{ $local->phone }}</p>
                                            @if ($local->type === 'Restaurante' && $local->website)
                                                <p><a class="text-dark" target="_blank"
                                                        href="{{ $local->website }}">{{ $local->website }}</a></p>
                                            @endif
                                            @if ($local->type === 'Restaurante' && $local->email)
                                                <p class="card-text">{{ $local->email }}</p>
                                            @endif
                                        @endif
                                        <a class="btn btn-dark" href="{{ $local->address }}">Como llegar</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
            @endif
        </div>
        <div class="row">
            {{ $locals->appends(request()->query())->links() }}
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <button class="btn btn-dark" type="submit" id="coordenadasBoton">Mostrar en el mapa</button>
                <div class="mapa mt-4 mb-4" id="mapa" style="height:400px;"></div>
            </div>
        </div>
    </main>
    @include('partials.footer')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let autoShowModal = new bootstrap.Modal(document.getElementById('autoShowModal'));
            autoShowModal.show();
        });
    </script>
</body>

</html>
