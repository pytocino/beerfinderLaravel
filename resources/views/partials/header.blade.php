@include('partials.buttonscroll')

<header class="bg-beer sticky-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center">
                    <a class="my-4" href="{{ route('home') }}">
                        @include('components.application-logo')
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
