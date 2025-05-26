<!DOCTYPE html>
{{-- <html lang="en" class="antialiased bg-gray-100 dark:bg-gray-800 system"> --}}
<html lang="en" class="antialiased bg-gray-100 system">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
        @vite('resources/css/app.css')

    </head>

    <body>

        <!-- main -->
        @yield('main')
        <!-- end main -->

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
        @vite('resources/js/app.js')

        <!-- footer -->
        @include('templates.footer')

        <!-- end footer -->


    </body>

</html>
