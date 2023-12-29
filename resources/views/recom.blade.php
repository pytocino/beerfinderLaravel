<div class="row">
    @foreach ($beers as $beer)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $beer->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Tipo: {{ $beer->description }}</h6>
                    <p class="card-text">{{ $beer->alcohol }}</p>
                    <p class="card-text">{{ $beer->color }}</p>
                    <p class="card-text">{{ $beer->country }}</p>
                    <p class="card-text">{{ $beer->taste }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
