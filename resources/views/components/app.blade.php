<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- Bootstrap link --}}
    <link href="{{ asset('css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css\style.css"> --}}
    {{-- <link rel="stylesheet" href="css\cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css"> --}}

</head>

<body>

        <section class="px-5 bg-light p-2 shadow fixed-top container">
            <header>
                <h1>Tweety</h1>
            </header>
        </section>



        <section class="px-5 main_content container">
            <main class="py-4">
                <div class="row top">
                    @if (auth()->check())
                        <div class="col-sm-12 col-lg-2 ">
                            @include('sidebar_links')
                        </div>
                    @endif
                    <div class="col-sm-12 col-lg-7 px-4">
                        @yield('content')
                    </div>
                    @if (auth()->check())
                    <div class="col-sm-12 col-lg-3 pe-2 ">
                        @include('friends_view')
                    </div>
                    @endif
                </div>
            </main>
        </section>
        {{-- {{$slot}} --}}

    </div>
    <script src="js\cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js"></script>

</body>

</html>

