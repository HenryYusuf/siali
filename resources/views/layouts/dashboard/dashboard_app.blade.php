<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" />
    <link rel="shortcut icon" href="{{ asset('src_dashboard/img/icons/icon-48x48.png') }}" />

    {{-- <link rel="canonical" href="https://demo-basic.adminkit.io/" /> --}}

    <title>SialMU - @yield('title')</title>

    <link href="{{ asset('src_dashboard/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap') }}"
        rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        {{-- Sidebar --}}
        @include('layouts.dashboard.sidebar')

        <div class="main">
            {{-- Header --}}
            @include('layouts.dashboard.header')

            {{-- Content --}}
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            {{-- Footer --}}
            @include('layouts.dashboard.footer')
        </div>
    </div>

    <script src="{{ asset('src_dashboard/js/app.js') }}"></script>
    <script src="{{ asset('https://kit.fontawesome.com/4ca89fc614.js') }}" crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
