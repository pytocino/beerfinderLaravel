<!-- The Modal -->
<div class="modal" class="form-control" id="myModal_{{ $local->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ $local->name }}</h4>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.locales.update', ['id' => $local->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $local->id }}">
                    <input type="hidden" for="name" name="name" value="{{ $local->name }}">
                    <div class="form-group mb-2">
                        <label class="form-label" for="type">Tipo</label>
                        <select name="type" class="form-control" id="type" class="form-control">
                            <option value="{{ $local->type }}" selected>{{ $local->type }}
                            </option>
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
                        <input type="text" name="email" class="form-control" id="email"
                            value="{{ $local->email }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="phone">Telefono</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            value="{{ $local->phone }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" id="address"
                            value="{{ $local->address }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="website">Web</label>
                        <input type="text" name="website" class="form-control" id="website"
                            value="{{ $local->website }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="city">Ciudad</label>
                        <input type="text" name="city" class="form-control" id="city"
                            value="{{ $local->city }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="region">Región</label>
                        <input type="text" name="region" class="form-control" id="region"
                            value="{{ $local->region }}">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="descriptcion">Descripcion</label>
                        <textarea name="descriptcion" class="form-control" id="descriptcion" rows="3" style="resize: none">{{ $local->description }}</textarea>
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="image">Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>

                    <div class="form-group mb-2">
                        <button type="submit" class="btn-success form-control">Editar</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
