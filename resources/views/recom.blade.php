<div class="row">
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
