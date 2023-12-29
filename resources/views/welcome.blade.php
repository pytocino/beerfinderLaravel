<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.finder')
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <h2 class="text-center">Esta semana te recomendamos</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($beers as $key => $beer)
                <div class="col-6 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($beer->image)
                                <img src="{{ $beer->image }}" class="card-img-top img-fluid mb-2"
                                    alt="{{ $beer->name }}">
                            @else
                                <img src="images/beerfinder.svg" class="card-img-top img-fluid mb-2"
                                    alt="{{ $beer->name }}">
                            @endif
                            <h5 class="card-title">{{ $beer->name }}</h5>
                            <p class="card-text">{{ $beer->graduation }}%</p>
                            <p class="card-text">{{ $beer->color }}</p>
                            <!--<p class="card-text">{{-- $beer->taste --}}</p>-->
                            <p class="card-text">{{ $beer->country }}</p>
                            <form class="d-flex justify-content-center" action="" method="GET">
                                <input type="hidden" name="marcaCerveza" value="{{ $beer->name }}">
                                <button type="submit" class="btn bg-beer fw-semibold">ENCUENTRALA</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </main>
    @include('partials.footer')
</body>

</html>
