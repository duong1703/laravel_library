<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body class="bg-light">
    <div class="container">
        <img class="ax-center my-10 w-24" src="{{ asset('img/CNTTIT.png') }}" width="210" height="75" />
        <div class="card p-6 p-lg-10 space-y-4">
            <h1 class="h3 fw-700">
                Thông tin đăng nhập thư viện của bạn
            </h1>
            <p>
            <h1>Chào mừng, {{ $name_login }}</h1>
            <p>Tài khoản của bạn đã được tạo thành công. Dưới đây là thông tin đăng nhập của bạn:</p>
            <p>Tên đăng nhập: {{ $name_login }}</p>
            <p>Mật khẩu: {{ $password }}</p>
            </p>
            <a class="btn btn-primary p-3 fw-700" href="{{ route('user_login') }}">Đăng nhập ngay</a>
        </div>
    </div>
</body>

</html>