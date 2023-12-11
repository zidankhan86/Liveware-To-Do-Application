<!DOCTYPE html>
<html lang="en">
    <head>

        @include('backend.fixed.css')


        @livewireStyles
    </head>
    <body class="sb-nav-fixed">



            @include('backend.fixed.header')

                    <div id="layoutSidenav">


            @include('backend.fixed.sidebar')

            <div id="layoutSidenav_content">

                <main>

                    {{ $slot }}
                   @yield('backend.layout')


                </main>

            @include('backend.fixed.footer')

            </div>
        </div>

        @include('backend.fixed.js')

        @livewireScripts

    </body>


</html>
