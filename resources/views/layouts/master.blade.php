<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        @include('layouts.menu')
        @yield('content')
        @include('layouts.footer')
    </section>
    <x-flash></x-flash>
</body>
</html>
