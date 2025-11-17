<!DOCTYPE html>
<html lang="en">


<head>
    <title>@yield('title', 'Coolmate Home')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- layout chính  -->
    <link rel="icon" type="image/png" href="{{asset('client/images/icons/favicon.png')}}" />

    <!-- CSS Vendor -->
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/MagnificPopup/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/main.css')}}">

    <!-- Admin Fonts/Styles (nếu cần) -->
    <link href="{{asset('adminclient/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('adminclient/css/sb-admin-2.min.css')}}" rel="stylesheet">

    @stack('styles')
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <div class="container-menu-desktop">
            @include('client.layouts.navbar')
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{asset('client/images/icons/icon-close2.png')}}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" method="GET" action="{{ route('search.result') }}">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="q" placeholder="Search..." value="{{ request('q') }}">
                </form>
            </div>
        </div>
    </header>

    <!-- Cart -->
    @include('client.layouts.giohang')

    <!-- Optional Slider (có thể ẩn trong search result) -->
    @yield('slider')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('client.layouts.fotter')

    <!-- JS Vendor -->
    <script src="{{asset('client/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('client/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('client/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('client/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('client/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('client/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('client/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('client/js/slick-custom.js')}}"></script>
    <script src="{{asset('client/vendor/parallax100/parallax100.js')}}"></script>
    <script src="{{asset('client/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('client/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('client/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('client/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>

    @stack('scripts')

</body>

</html>
