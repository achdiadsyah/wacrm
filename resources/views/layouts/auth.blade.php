<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <div id="auth">
            <div class="row h-100">
                @yield('content') 
            </div>  
        </div>
        @stack('foot-script')
    </body>
</html>