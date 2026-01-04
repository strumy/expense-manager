<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    
    <body id="page-top">
        <!-- Navigation-->
        @include('layouts.navigation')
        
        <!-- Top section-->
        @yield('top')

        <!-- Content section-->
        @yield('content')

        <!-- Footer-->
        @include('layouts.footer')

        <!-- MDB -->
        @include('layouts.scripts')
    </body>
</html>