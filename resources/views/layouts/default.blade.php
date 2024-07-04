<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div id="wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    @yield('script')
</body>
</html>
