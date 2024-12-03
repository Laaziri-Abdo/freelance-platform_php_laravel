<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Freelancing') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css'>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body >
   
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}"> <img src="/img/logo.PNG"  style="width: 160px" alt="helllo"></a>
          <div class="d-flex">
         
            @yield('content')
        
            <footer class="bg-dark py-4 mt-auto">
                <div class="container px-5">
                    <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                        <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Freelancing 2021</div></div>
                        <div class="col-auto">
                            <a class="link-light small" target="_blank" href="https://www.facebook.com/profile.php?id=100010384025308"><i class="fab fa-facebook"></i> Facebook</a>
                            <span class="text-white mx-1">&middot;</span>
                            <a class="link-light small" href="#"><i class="fab fa-google"></i> Google</a>
                            <span class="text-white mx-1">&middot;</span>
                            <a class="link-light small" target="_blank" href="https://www.linkedin.com/in/hamza-elglaoui-b56b691a1/"><i class="fab fa-linkedin"></i> Linkedin</a>
                        </div>
                    </div>
                </div>
            </footer>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js'></script>

            <script src="/js/slider.js"></script>
            
        </body>
</html>

