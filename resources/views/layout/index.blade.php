<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="">
@include('layout.header')

<body>
    @if (Route::is('dashboard') || Route::is('atendimentos'))
        @include('layout.navbar')
        @include('layout.sidebar')
    @endif

    @yield('section')

    @stack('scripts')
</body>

</html>
