<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <div id="app">
            @include('layouts.sidebar')
            <div id="main" class="layout-navbar">
                @include('layouts.header')
                <div id="main-content">
                    @yield('content')

                    @include('layouts.footer')
                </div>  
            </div>  
        </div>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @stack('foot-script')
    </body>
</html>