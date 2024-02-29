<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de control') }}
        </h2>
    </x-slot>

    @if ($user->name == 'admin')
        <div class=" text-center my-3">
            <a href="#cervezas" class="btn btn-primary mx-2">Cervezas</a>
            <a href="#locales" class="btn btn-primary mx-2">Locales</a>
            <input class="my-2" type="text" id="searchInput" placeholder="Buscar...">
        </div>
        <div class="container" id="admin">
            <hr class="mb-2">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <table class="table table-striped table-dark table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="col">ID</th class="col">
                                <th class="col">Nombre</th class="col">
                                <th class="col">Email</th class="col">
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            <hr class="my-2">
            <div class="row">
                @if (@isset($eventsByHour))
                    <div class="col-12 col-sm-6">
                        <canvas id="eventsByHourChart" width="300" height="300"></canvas>
                    </div>
                @endif

                @if (@isset($eventsByPreviousUrl))
                    <div class="col-12 col-sm-6">
                        <canvas id="eventsByPreviousUrlChart" width="300" height="300"></canvas>
                    </div>
                @endif
            </div>


            <hr class="my-2">
            <div class="row" id="locales">
                <h2 class="h2 text-center">Locales</h2>
                @include('partials.createlocal')
                @foreach ($locales as $local)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card p-3 m-3">
                            <div class="h3 mb-3 d-flex align-items-center">
                                <span>{{ $local->name }}</span>
                                @if ($local->verified)
                                    <img src="images/verificado.png" alt="icono de verificado" class="ml-2">

                                    <a target="_blank" href="https://icons8.com/icon/6xO3fnY41hu2/verificado"
                                        hidden>verificado</a>
                                    <p hidden>icono de</p><a target="_blank" href="https://icons8.com" hidden>Icons8</a>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('dashboard.locales.update', ['id' => $local->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $local->id }}">

                                <div class="form-group mb-2">
                                    <label class="form-label" for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $local->name }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label" for="type">Tipo</label>
                                    <select name="type" class="form-control" id="type" class="form-control">
                                        <option value="{{ $local->type }}" selected>{{ $local->type }}
                                        </option>
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
                                    <label class="form-label" for="latitude">Latitud</label>
                                    <input type="text" name="latitude" class="form-control" id="latitude"
                                        value="{{ $local->latitude }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="longitude">Longitud</label>
                                    <input type="text" name="longitude" class="form-control" id="longitude"
                                        value="{{ $local->longitude }}">
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
                                    <label class="form-label" for="description">Descripcion</label>
                                    <textarea name="description" class="form-control" id="description" rows="3" style="resize: none">{{ $local->description }}</textarea>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="verified">Verificado</label>
                                    <select name="verified" class="form-control" id="verified"
                                        class="form-control">
                                        @if ($local->verified)
                                            <option value="1" selected>Si</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Si</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="image">Imagen</label>
                                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="user_id">User ID</label>
                                    <input type="number" class="form-control-file" id="user_id" name="user_id"
                                        value="{{ $local->user_id }}">
                                </div>


                                <div class="form-group mb-2">
                                    <button type="submit"
                                        class="btn bg-success text-white form-control">Editar</button>
                                </div>
                            </form>
                            <form action="{{ route('dashboard.locals.delete', ['id' => $local->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $local->id }}">

                                <div class="form-group mb-2">
                                    <button type="submit" class="btn bg-danger form-control text-white">Eliminar
                                    </button>
                                </div>
                            </form>
                            <div class="card-footer">
                                {{ __('Cervezas') }}
                                @foreach ($local->beers as $beer)
                                    <span class="btn badge rounded-pill bg-warning text-dark my-2 position-relative"
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
                                                                class="btn bg-danger text-white">Eliminar</button>
                                                            <button type="button" class="btn bg-dark text-white"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <span class="btn badge rounded-pill bg-warning text-dark position-relative my-2"
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
                                                            class="btn bg-success text-white form-control">Agregar
                                                            Cerveza</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button class="btn bg-danger text-white"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
                @if (session('success'))
                    <div class="alert alert-success fixed-bottom right-0 p-3 m-3 fade-out"
                        style="position: fixed; bottom: 0; right: 0;">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="row" id="cervezas">
                <h2 class="h2 text-center my-3">Cervezas</h2>
                @include('partials.createbeer')
                @foreach ($cerves as $cerve)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card p-3 m-3">
                            <div class="h3 mb-3 d-flex align-items-center">
                                <span>{{ $cerve->name }}</span>
                            </div>
                            <form method="POST"
                                action="{{ route('dashboard.cervezas.update', ['id' => $cerve->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $cerve->id }}">

                                <div class="form-group mb-2">
                                    <label class="form-label" for="name">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $cerve->name }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="color">Color</label>
                                    <input type="text" name="color" id="color" class="form-control"
                                        value="{{ $cerve->color }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="graduation">Graduacion</label>
                                    <input type="text" name="graduation" id="graduation" class="form-control"
                                        value="{{ $cerve->graduation }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="taste">Sabor</label>
                                    <input type="text" name="taste" id="taste" class="form-control"
                                        value="{{ $cerve->taste }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="type">Tipo</label>
                                    <input type="text" name="type" id="type" class="form-control"
                                        value="{{ $cerve->type }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="description">Descripcion</label>
                                    <input type="text" name="description" id="description" class="form-control"
                                        value="{{ $cerve->description }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="country">Pais</label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        value="{{ $cerve->country }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="city">Ciudad</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ $cerve->city }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="region">Region</label>
                                    <input type="text" name="region" id="region" class="form-control"
                                        value="{{ $cerve->region }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="image">Imagen</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>

                                <div class="form-group mb-2">
                                    <button type="submit" class="btn bg-success form-control text-white">Modificar
                                        Cerveza</button>
                                </div>

                                <div class="form-group mb-2" hidden>
                                    <p>{{ $cerve->user_id }}</p>
                                </div>
                            </form>
                            <form action="{{ route('dashboard.cervezas.delete', ['id' => $cerve->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $cerve->id }}">

                                <div class="form-group mb-2">
                                    <button type="submit" class="btn bg-danger form-control text-white">Eliminar
                                        Cerveza</button>
                                </div>
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success fixed-bottom right-0 p-3 m-3 fade-out"
                style="position: fixed; bottom: 0; right: 0;">
                {{ session('success') }}
            </div>
        @endif
    @else
        <main class="container">
            <div class="row my-5">
                @if ($locals->count() > 0)
                    @foreach ($locals as $local)
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-4">
                                    @if ($local->image)
                                        <img src="{{ Storage::url($local->image) }}"
                                            class="card-img-top img-fluid p-4" alt="{{ $local->name }}">
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
                                            <a href="{{ $local->website }}"
                                                target="_blank">{{ $local->website }}</a>
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
                                                                    class="btn bg-danger text-white">Eliminar</button>
                                                                <button type="button" class="btn bg-dark text-white"
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
                                                            <select name="beer_id" class="form-control"
                                                                id="beer_id">
                                                                <!-- Opciones para seleccionar una cerveza -->
                                                                @foreach ($beers as $beer)
                                                                    <option value="{{ $beer->id }}">
                                                                        {{ $beer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-2">
                                                            <button type="submit"
                                                                class="btn bg-success form-control">Agregar
                                                                Cerveza</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button class="btn bg-danger"
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
                    <p>No hay locales asociados a <strong>{{ $user->name }}</strong>.</p>
                    @include('partials.createlocal2')
                @endif
            </div>
        </main>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    @if (isset($eventsByHour))
        <script>
            // Datos para el gráfico de distribución por horas
            let eventsByHourData = {!! $eventsByHour !!};

            // Preparar datos para Chart.js
            let hours = eventsByHourData.map(data => data.hour);
            let counts = eventsByHourData.map(data => data.total);

            // Configuración del gráfico de distribución por horas
            let ctx = document.getElementById('eventsByHourChart').getContext('2d');
            let chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: hours,
                    datasets: [{
                        label: 'Visitas por horas',
                        data: counts,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Visitas'
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Hora del día'
                            }
                        }]
                    }
                }
            });
        </script>
    @endif

    @if (@isset($eventsByPreviousUrl))
        <script>
            // Datos para el gráfico de distribución por URLs de referencia
            let eventsByPreviousUrlData = {!! $eventsByPreviousUrl !!};

            // Preparar datos para Chart.js
            let urls = eventsByPreviousUrlData.map(data => data.first_route);
            let counts2 = eventsByPreviousUrlData.map(data => data.total);

            // Configuración del gráfico de distribución por URLs de referencia
            let ctx2 = document.getElementById('eventsByPreviousUrlChart').getContext('2d');
            let chart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: urls,
                    datasets: [{
                        label: 'Visitas por URL',
                        data: counts2,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Visitas'
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'URL previa'
                            }
                        }]
                    }
                }
            });
        </script>
    @endif

</x-app-layout>
