<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/?size=100&id=119436&format=png&color=000000">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/easion.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{ asset('js/chart-js-config.js') }}"></script>
    <title>Khôi phục tài khoản</title>
</head>

<body class="bg-primary">
    <div class="form-screen">
        <a href="" class="easion-logo">
            <img src="{{ asset('img/CNTTIT.png') }}" width="210" height="75">
        </a>
        <p class="fs-1 text-light">THƯ VIỆN ĐIỆN TỬ KHOA CÔNG NGHỆ THÔNG TIN</p>
        <div class="card account-dialog rounded-lg">
            <div class="card-header bg-primary text-white rounded-lg">Khôi phục mật khẩu</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control rounded-lg @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" name="password" id="password"
                            class="form-control rounded-lg @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control rounded-lg @error('password_confirmation') is-invalid @enderror" required>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded-lg">Khôi phục mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/easion.js') }}"></script>
</body>

</html>
