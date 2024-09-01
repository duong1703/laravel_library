<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="Free Bootstrap Theme by ProBootstrap.com">
    <meta name="keywords"
        content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>

    <div class="probootstrap-search" id="probootstrap-search">
        <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
        <form action="#">
            <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
        </form>
    </div>

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

</html>