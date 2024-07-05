<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    @hasSection('left-bar')
        {{-- Style for left-sidebar layout --}}
        <link rel="stylesheet" href="{{ asset('assets/css/layouts/left-sidebar.css') }}?v=@php echo date('YmdHis'); @endphp">
    @endif
</head>
@hasSection('left-bar')
    <body class="layout-admin layout-padded aside-sticky" data-s2t-class="btn-primary btn-sm bg-gradient-default rounded-circle border-0">
@else
    <body class="layout-admin">
@endif
    <div id="wrapper">
        @include('includes.navbar')

        <div id="wrapper_content">
            @hasSection('left-bar')
                <aside id="aside-main" class="aside-start aside-hide-xs bg-white shadow-sm d-flex flex-column p-3 h-auto">
                    <div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">
                        <nav class="nav-deep nav-deep-sm nav-deep-light js-ajaxified">
                            <ul class="nav flex-column">
                                @yield('left-bar')
                            </ul>
                        </nav>
                    </div>
                </aside>

                <main id="middle" class="flex-fill mx-auto">
                    @yield('content')
                </main>
            @else
                <div class="container-fluid">
                    @yield('content')
                </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    @yield('script')
</body>
</html>
