<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Mohsen Zamani" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="فروش ماشین های اداری وصال تک">
    <meta name="keywords"
          content="ماشین های اداری وصال تک ">

    <!-- SITE TITLE -->
    <title>{{env('APP_NAME_PERSIAN')}}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo.png')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/rtl-style.css')}}">
    @stack('styles')
</head>

<body dir="rtl">

<!-- LOADER -->
{{--<div class="preloader">--}}
{{--    <div class="lds-ellipsis">--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- END LOADER -->
<div class="middle-header dark_skin">
    <div class="container">
        <div class="nav_block">
            <a class="navbar-brand" href="{{route('FrontEnd.home.index')}}">
                <img class="logo_light" src="{{asset('assets/images/logo.png')}}" alt="logo"/>
                <img class="logo_dark" src="{{asset('assets/images/logo.png')}}" alt="logo"/>
            </a>
            <div class="contact_phone order-md-last">
                <i class="linearicons-phone-wave"></i>
                @isset($contactUs->data)
                    <span>{{$contactUs->data['phone']}}</span>
                @endif
            </div>
            <div class="product_search_form">
                <form>
                    <div class="input-group">
                        <input class="form-control" placeholder="جستجوی محصول ..." required="" type="text">
                        <button type="submit" class="search_btn"><i class="linearicons-magnifier"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
<div class="main_content">
    @yield('content')
</div>
@include('layouts.FrontEnd.footer')
<!-- Latest jQuery -->
<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
<!-- popper min js -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- owl-carousel min js  -->
<script src="{{asset('assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
<!-- magnific-popup min js  -->
<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
<!-- waypoints min js  -->
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<!-- parallax js  -->
<script src="{{asset('assets/js/parallax.js')}}"></script>
<!-- countdown js  -->
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<!-- imagesloaded js -->
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- isotope min js -->
<script src="{{asset('assets/js/isotope.min.js')}}"></script>
<!-- jquery.dd.min js -->
<script src="{{asset('assets/js/jquery.dd.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<!-- elevatezoom js -->
<script src="{{asset('assets/js/jquery.elevatezoom.js')}}"></script>
<!-- scripts js -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
@stack('scripts')
</body>
</html>
