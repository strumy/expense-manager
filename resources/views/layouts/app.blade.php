<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    
    <body id="page-top">
        <!-- Navigation-->
        @include('layouts.navigation')
        
        <!-- Header-->
        @include('layouts.header')
        
        <!-- Top section-->
        @yield('top')

        <!-- Services section-->
        @yield('services')

        <!-- Footer-->
        @include('layouts.footer')

        <!-- MDB -->
        @include('layouts.scripts')
    </body>
</html>