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
    <link rel="stylesheet" href="{{ asset('css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
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
<script src="{{ asset('js/scripts.min.js') }}" defer></script>
<script src="{{ asset('js/main.min.js') }}" defer></script>
<script src="{{ asset('js/custom.js') }}" defer></script>


</html>