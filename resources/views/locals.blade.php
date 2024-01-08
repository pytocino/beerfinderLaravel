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
            <div class="col-12">
                <h1 class="text-center my-3">{{ request('name') }}</h1>
            </div>
        </div>
        <div class="row">
            @if (count($locals) === 0)
                <div class="col-12">
                    <p class="text-center">No se encontraron locales verificados</p>
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
                                            <img src="images/verificado.png" alt="icono de verificado" class="ml-2">

                                            <a target="_blank" href="https://icons8.com/icon/6xO3fnY41hu2/verificado"
                                                hidden>verificado</a>
                                            <p hidden>icono de</p><a target="_blank" href="https://icons8.com"
                                                hidden>Icons8</a>
                                        @endif
                                    </div>
                                    <p class="card-text">{{ $local->type }}</p>
                                    <h6>Contacto</h6>
                                    <p class="card-text">{{ $local->phone }}</p>
                                    @if ($local->type === 'Restaurante')
                                        @if ($local->website)
                                            <p><a class="text-dark" target="_blank"
                                                    href="{{ $local->website }}">{{ $local->website }}</a></p>
                                        @endif
                                        @if ($local->email)
                                            <p class="card-text">{{ $local->email }}</p>
                                        @endif
                                    @endif
                                    <a class="btn btn-dark" href="{{ $local->address }}">Como llegar</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-center">No se encontraron resultados</p>
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
</body>

</html>
