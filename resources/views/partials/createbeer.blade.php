<div class="col-3">
    <div class="card p-3 m-3">
        <div class="h3 mb-3 d-flex align-items-center">
            <span>AÑADIR CERVEZA</span>
        </div>

        <form method="POST" action="{{ route('guardar_cerveza') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label class="form-label" for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="description">Descripcion</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="type">Tipo</label>
                <input type="text" name="type" id="type" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="country">Pais</label>
                <input type="text" name="country" id="country" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="city">Ciudad</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="region">Region</label>
                <input type="text" name="region" id="region" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="graduation">Graduacion</label>
                <input type="text" name="graduation" id="graduation" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="color">Color</label>
                <input type="text" name="color" id="color" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="taste">Taste</label>
                <input type="text" name="taste" id="taste" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="user_id">User ID</label>
                <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $user->id }}">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="image">Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
            </div>

            <div class="form-group mb-2">
                <button type="submit" class="btn bg-success form-control text-white">Añadir
                    Cerveza</button>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success fixed-bottom right-0 p-3 m-3 fade-out"
                style="position: fixed; bottom: 0; right: 0;">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
