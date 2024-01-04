<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

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
                    <p class="text-center">No se encontraron resultados</p>
                </div>
            @else
                @foreach ($locals as $local)
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card">
                            @if ($local->image)
                                <img src="{{ Storage::url($local->image) }}" class="card-img-top img-fluid p-4"
                                    alt="{{ $local->name }}">
                            @else
                                <img src="images/default.png" class="card-img-top img-fluid p-4"
                                    alt="{{ $local->name }}">
                            @endif
                            <div class="card-body">


                                <div class="h3 mb-3 d-flex align-items-center">
                                    <h4 class="card-title">{{ $local->name }}</h4>
                                    @if ($local->verified)
                                        <img src="images/verificado.png" alt="icono de verificado" class="ml-2">

                                        <a target="_blank" href="https://icons8.com/icon/6xO3fnY41hu2/verificado"
                                            hidden>verificado</a>
                                        <p hidden>icono de</p><a target="_blank" href="https://icons8.com"
                                            hidden>Icons8</a>
                                    @endif
                                </div>

                                <h5 class="card-text">{{ $local->type }}</h5>
                                <p class="card-text">{{ $local->description }}</p>
                                @if ($local->type === 'Restaurante')
                                    <h6>Contacto</h6>
                                    <p class="card-text">{{ $local->website }}</p>
                                    <p class="card-text">{{ $local->email }}</p>
                                    <p class="card-text">{{ $local->phone }}</p>
                                @endif
                                <a class="btn btn-dark" href="{{ $local->address }}">Como llegar</a>
                            </div>
                        </div>
                    </div>
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
