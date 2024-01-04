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
                    <div class="col-6 col-md-4 mb-4">
                        <div class="card">
                            @if ($local->image)
                                <img src="{{ Storage::url($local->image) }}" class="card-img-top img-fluid"
                                    alt="{{ $local->name }}">
                            @else
                                <img src="images/beerfinder.svg" class="card-img-top img-fluid p-4"
                                    alt="{{ $local->name }}">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{ $local->name }}</h4>
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
