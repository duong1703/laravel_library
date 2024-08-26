<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đăng nhập của bạn</title>
</head>
<body>
<h1>Chào mừng, {{ $email }}</h1>
    <p>Tài khoản của bạn đã được tạo thành công. Dưới đây là thông tin đăng nhập của bạn:</p>
    <p>Email: {{ $email }}</p>
    <p>Mật khẩu: {{ $password }}</p>
    <p>Bạn có thể đăng nhập tại <a href="{{ route('user_login') }}"></a>.</p>
</body>
</html>
