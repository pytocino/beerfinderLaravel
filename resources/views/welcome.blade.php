<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.finder')
            </div>
        </div>
        <div class="row">
            @php
            @endphp
            @foreach ($beers as $beer)
                <div class="col-6 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $beer->name }}</h5>
                            <p class="card-text">{{ $beer->alcohol }}</p>
                            <p class="card-text">{{ $beer->color }}</p>
                            <p class="card-text">{{ $beer->country }}</p>
                            <!--<p class="card-text">{{-- $beer->taste --}}</p>-->
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
