<div class="my-4">
    <form class="text-white text-center form form-control text-center bg-dark" action="{{ route('locals') }}"
        method="GET">
        <label for="name" class="form-label fw-semibold display-5 my-3">¿QUE CERVEZA TE
            APETECE?</label>
        <select class="form-select my-2" id="name" name="name" required>
            <option class="text-center" value="" selected>Escoge una</option>
            @foreach ($beernames as $beername)
                <option class="text-center" value="{{ $beername->name }}">{{ $beername->name }} -
                    {{ $beername->graduation }} - {{ $beername->color }}</option>
            @endforeach
        </select>
        <button type="reset" class="btn btn-danger fw-semibold my-2">Borrar</button>
        <button type="submit" class="btn btn-success fw-semibold my-2">ENCUENTRALA</button>
    </form>
</div>
