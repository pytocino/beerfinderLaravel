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
                                        <p>{{ $local->phone }}</p>
                                        <p>{{ $local->email }}</p>
                                        <p>{{ $local->city }}</p>
                                        <p>{{ $local->region }}</p>
                                    </div>
                                    <p class="card-text mt-3">
                                        {{ $local->description }}
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary">Editar</button>
                                    </div>
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
