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
        <script src="{{ asset('assets/js/extensions/sweetalert2.js') }}"></script>>
        @if(session('text'))
        <script>
            Swal.fire({
                text: "{{ session('text') }}",
                icon: "{{ session('icon')?session('icon'):info }}",
                confirmButtonText: "Close",
                timer: 5000,
            });
        </script>
        @endif
        @stack('foot-script')
    </body>
</html>