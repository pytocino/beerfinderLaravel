<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de control') }}
        </h2>
    </x-slot>
    <main class="container">
        <div class="row my-5">
            @if ($locals->count() > 0)
                @foreach ($locals as $local)
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-4">
                                @if ($local->image)
                                    <img src="{{ Storage::url($local->image) }}" class="card-img-top img-fluid"
                                        alt="{{ $local->name }}">
                                @else
                                    <img src="images/beerfinder.svg" class="card-img-top img-fluid p-4"
                                        alt="{{ $local->name }}">
                                @endif
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="h3 mb-3">
                                        {{ $local->name }}
                                    </div>
                                    <div class="info">
                                        <p>{{ $local->type }}</p>
                                        <p>{{ $local->email }}</p>
                                        <p>{{ $local->phone }}</p>
                                        <p>{{ $local->address }}</p>
                                        <a href="{{ $local->website }}" target="_blank">{{ $local->website }}</a>
                                        <p>{{ $local->city }}</p>
                                        <p>{{ $local->region }}</p>
                                    </div>
                                    <p class="card-text mt-3">
                                        {{ $local->description }}
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Editar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" class="form-control" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ $local->name }}</h4>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $local->id }}">
                                        <input type="hidden" for="name" name="name"
                                            value="{{ $local->name }}">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="type">Tipo</label>
                                            <select name="type" class="form-control" id="type"
                                                class="form-control">
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
                                            <label class="form-label" for="descripcion">Descripcion</label>
                                            <textarea name="descripcion" class="form-control" id="descripcion" rows="3" style="resize: none">{{ $local->description }}</textarea>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="image">Imagen</label>
                                            <input type="file" class="form-control-file" id="imagen"
                                                name="imagen">
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
                @endforeach
            @else
                <p>No hay locales asociados a este usuario.</p>
            @endif
        </div>
    </main>
</x-app-layout>
