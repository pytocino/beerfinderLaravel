<div class="col-12 col-md-3">
    <div class="card p-3 m-3">
        <div class="h3 mb-3 d-flex align-items-center">
            <span>AÑADIR LOCAL</span>
        </div>

        <form method="POST" action="{{ route('guardar_local') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label class="form-label" for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label class="form-label" for="type">Tipo</label>
                <select name="type" class="form-control" id="type" class="form-control">
                    <option value="" selected>Elige uno</option>
                    <option value="Cafeteria">Cafeteria</option>
                    <option value="Discoteca">Discoteca</option>
                    <option value="Pub">Pub</option>
                    <option value="Bar">Bar</option>
                    <option value="Cervecería">Cervecería</option>
                    <option value="Restaurante">Restaurante</option>
                    <option value="Club">Club</option>
                    <option value="Tienda">Tienda</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="phone">Telefono</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="address">Dirección</label>
                <input type="text" name="address" class="form-control" id="address">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="latitude">Latitud</label>
                <input type="text" name="latitude" class="form-control" id="latitude">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="longitude">Longitud</label>
                <input type="text" name="longitude" class="form-control" id="longitude">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="website">Web</label>
                <input type="text" name="website" class="form-control" id="website">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="city">Ciudad</label>
                <input type="text" name="city" class="form-control" id="city">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="region">Región</label>
                <input type="text" name="region" class="form-control" id="region">
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="description">Descripcion</label>
                <textarea name="description" class="form-control" id="description" rows="3" style="resize: none"></textarea>
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="verified">Verificado</label>
                <select name="verified" id="verified" class="form-control">
                    <option value="1">Si</option>
                    <option value="0" selected>No</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="user_id">User id</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="1" selected>1</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <button type="submit" class="btn bg-success text-white form-control">Crear</button>
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
