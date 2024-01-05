<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de control') }}
        </h2>
    </x-slot>
    @if ($user->name == 'admin')
        <div class="container" id="admin">
            <div>
                <h2 class="h2">Locales</h2>
                @foreach ($locales as $local)
                    <p>{{ $local->name }}</p>
                @endforeach
            </div>
            <div>
                <h2 class="h2">Cervezas</h2>
                @foreach ($beers as $beer)
                    <p>{{ $beer->name }}</p>
                @endforeach
            </div>
        </div>
    @else
        <main class="container">
            <div class="row my-5">
                @if ($locals->count() > 0)
                    @foreach ($locals as $local)
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-4">
                                    @if ($local->image)
                                        <img src="{{ Storage::url($local->image) }}" class="card-img-top img-fluid p-4"
                                            alt="{{ $local->name }}">
                                    @else
                                        <img src="images/defaultlocal.png" class="card-img-top img-fluid p-4"
                                            alt="{{ $local->name }}">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        {{ __('Local') }}
                                        <div class="h3 mb-3 d-flex align-items-center">
                                            <span>{{ $local->name }}</span>
                                            @if ($local->verified)
                                                <img src="images/verificado.png" alt="icono de verificado"
                                                    class="ml-2">

                                                <a target="_blank"
                                                    href="https://icons8.com/icon/6xO3fnY41hu2/verificado"
                                                    hidden>verificado</a>
                                                <p hidden>icono de</p><a target="_blank" href="https://icons8.com"
                                                    hidden>Icons8</a>
                                            @endif
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
                                            <button class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#myModal_{{ $local->id }}">
                                                Editar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{ __('Cervezas') }}
                                    @foreach ($local->beers as $beer)
                                        <span
                                            class="btn badge rounded-pill bg-warning text-dark text-lg my-2 position-relative"
                                            alt="eliminar cerveza" data-bs-toggle="modal"
                                            data-bs-target="#myDelModal_{{ $local->id }}_{{ $beer->id }}">{{ $beer->name }}
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                                <span class="visually-hidden">Eliminar cerveza</span>
                                            </span>
                                        </span>


                                        <div class="modal" id="myDelModal_{{ $local->id }}_{{ $beer->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Eliminar {{ $beer->name }}</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <p>¿Estás seguro de que quieres eliminar la cerveza
                                                            "{{ $beer->name }}" del local "{{ $local->name }}"?
                                                        </p>
                                                        <form method="POST" action="{{ route('eliminarCerveza') }}">
                                                            @csrf
                                                            <input type="hidden" name="local_id"
                                                                value="{{ $local->id }}">
                                                            <input type="hidden" name="beer_id"
                                                                value="{{ $beer->id }}">
                                                            <div class="text-end">
                                                                <button type="submit"
                                                                    class="btn btn-danger">Eliminar</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <span
                                        class="btn badge rounded-pill bg-warning text-dark text-lg position-relative my-2"
                                        alt="añadir cerveza" data-bs-toggle="modal"
                                        data-bs-target="#myNewModal_{{ $local->id }}">Añadir cerveza
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                                            <span class="visually-hidden">Añadir cerveza</span>
                                        </span>
                                    </span>



                                    <div class="modal" id="myNewModal_{{ $local->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{ $local->name }}</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('agregarCerveza') }}">
                                                        @csrf
                                                        <input type="hidden" name="local_id"
                                                            value="{{ $local->id }}">
                                                        <div class="form-group mb-2">
                                                            <label class="form-label" for="beer_id">Seleccionar
                                                                Cerveza</label>
                                                            <select name="beer_id" class="form-control" id="beer_id">
                                                                <!-- Opciones para seleccionar una cerveza -->
                                                                @foreach ($beers as $beer)
                                                                    <option value="{{ $beer->id }}">
                                                                        {{ $beer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-2">
                                                            <button type="submit"
                                                                class="btn btn-success form-control">Agregar
                                                                Cerveza</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @include('partials.editLocal')
                    @endforeach
                @else
                    <p>No hay locales asociados a este usuario.</p>
                @endif
            </div>
        </main>
    @endif
</x-app-layout>
