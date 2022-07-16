<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <div id="auth">
            <div class="row h-100">
                @yield('content') 
            </div>  
        </div>
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