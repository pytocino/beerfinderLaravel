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
            @foreach ($locals as $local)
                <div class="col-6 col-md-4 mb-4">
                    <div class="card">
                        @if ($local->image)
                            <img src="{{ $local->image }}" class="card-img-top img-fluid" alt="{{ $local->name }}">
                        @else
                            <img src="images/beerfinder.svg" class="card-img-top img-fluid p-4"
                                alt="{{ $local->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $local->name }}</h5>
                            <p class="card-text">{{ $local->description }}</p>
                            <p class="card-text">{{ $local->type }}</p>
                            <a class="btn btn-dark" href="{{ $local->address }}">Como llegar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    @include('partials.footer')
</body>

</html>