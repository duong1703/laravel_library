<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/?size=100&id=119436&format=png&color=000000">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('css/easion.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src=" {{ asset('js/chart-js-config.js') }}"></script>
    <title>Trang đăng nhập</title>
</head>

<body class="bg-primary">
    <div class="form-screen">
        <a href="" class="easion-logo">
            <img src="{{ asset('img/CNTTIT.png') }}" width="210" height="75">
        </a>
        <p class="fs-1 text-light">THƯ VIỆN ĐIỆN TỬ KHOA CÔNG NGHỆ THÔNG TIN</p>
        <div class="card account-dialog rounded-lg">
            <div class="card-header bg-primary text-white rounded-lg"> Vui lòng đăng nhập</div>
            @if ($errors->has('captcha_failed'))
            <div class="alert alert-danger">
                {{ $errors->first('captcha_failed') }}
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('login_process') }}" method="post">
                    @csrf
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
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control rounded-lg @error('password') is-invalid @enderror" required>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="cf-turnstile mt-3 text-center" data-sitekey="{{ env('SITE_KEY') }}"
                        data-callback="javascriptCallback"></div>

                    <button type="submit" class="btn btn-primary btn-block rounded-lg">Đăng nhập</button>
                    <div class="mt-2 text-center">
                        <a href="{{ route('password.request') }}">Quên mật khẩu</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src=" {{ asset('js/easion.js') }}"></script>
</body>

</html>