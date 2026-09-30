<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
</head>

<body>

    <header>
        <h1>Sistem Informasi Klinik</h1>
    </header>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>