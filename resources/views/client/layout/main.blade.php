<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/?size=100&id=119436&format=png&color=000000">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="keywords"
        content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@8.5.1/themes/satellite-min.css" integrity="sha256-woeV7a4SRDsjDc395qjBJ4+ZhDdFn8AqswN1rlTO64E=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@8.5.1/themes/reset-min.css" integrity="sha256-KvFgFCzgqSErAPu6y9gz/AhZAvzK48VJASu3DpNLCEQ=" crossorigin="anonymous">
    
</head>
<!-- Google tag (gtag.js) -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-B9177KNB74"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-B9177KNB74');
</script> -->

<body >
    <div class="probootstrap-page-wrapper">
        <!-- Fixed navbar -->

        <div class="probootstrap-header-top">
            <div class="container">
                @include('client/layout/fixnavbar')
            </div>
        </div>
        <nav class="navbar navbar-blue probootstrap-navbar">
            <div class="container">
                @include('client/layout/header')
            </div>
        </nav>

        @if (Request::is('/'))
            @include('client/layout/slide')
        @endif

        <!-- Đây là nơi phần nội dung của trang sẽ được chèn -->
        @yield('content')

        @include('client/layout/footer')
    </div>


</body>
<script src="{{ asset('js/scripts.min.js') }}"></script>
<script src="{{ asset('js/main.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.24.0/dist/algoliasearch-lite.umd.js" integrity="sha256-b2n6oSgG4C1stMT/yc/ChGszs9EY/Mhs6oltEjQbFCQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.74.2/dist/instantsearch.production.min.js" integrity="sha256-LfyQz2E24221PkRbKoakchcpdlZOA4R1Ugi6NnhyGF0=" crossorigin="anonymous"></script>


</html>