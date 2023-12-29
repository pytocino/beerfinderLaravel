<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body>
    @include('partials.header')
    <main class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.finder')
            </div>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
