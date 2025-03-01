<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('fav/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('fav/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('fav/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('fav/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('fav/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('fav/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('fav/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('fav/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('fav/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('fav/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('fav/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('fav/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- up to 10% speed up for external res -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <!-- preloading icon font is helping to speed up a little bit -->
    <link rel="preload" href="{{ asset('assets/fonts/flaticon/Flaticon.woff2') }}" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="{{ asset('assets/css/core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor_bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap">
    <script src="https://kit.fontawesome.com/37eeb8cf9d.js" crossorigin="anonymous"></script>
</head>

<body class="layout-admin layout-padded aside-sticky" data-s2t-class="btn-primary btn-sm bg-gradient-default rounded-circle border-0">
    <div class="page-loader" id="page-loader">
        <div class="loader"></div>
    </div>


    <div id="wrapper" class="d-flex align-items-stretch flex-column">
        @include('layouts.sections.header')

        <div id="wrapper_content" class="d-flex flex-fill">
            @include('layouts.sections.leftbar')

            <main id="middle" class="flex-fill mx-auto">
                @if(isset($title) && !empty($title))
                <header class="mt-lg-n6">
                    <h1 class="h3 text-primary">{{ $title }}</h1>
                    @isset($description)
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb small">
                            <li class="breadcrumb-item text-muted active" aria-current="page">{{ $description }}</li>
                        </ol>
                    </nav>
                    @endisset

                </header>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor_bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('layouts.sections.flash-messages')

    <script>
        document.addEventListener("visibilitychange", function() {
            if (!document.hidden) {
                $('#page-loader').hide();
            }
        });

        function pageLoader() {
            console.log('page load');
            $('#page-loader').show();
        }

        function hidePageLoader() {
            $('#page-loader').hide();
        }
        $(document).ready(function() {
            hidePageLoader();

            $("a").click(function() {
                //console.log($(this).attr("href"));
                let clickUrl = $(this).attr("href");
                if (!clickUrl.startsWith('javascript')) {
                    //$('#page-loader').show();
                }
            });

            $(window).on('beforeunload', function() {
                $('#page-loader').show();
            });
        });

    </script>

    @yield('script')

    @yield('modal')
</body>

</html>
