<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập thành viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/?size=100&id=119436&format=png&color=000000">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <link rel="stylesheet" href=" {{ asset('css/style1.css') }} ">

</head>

<body>
    <section class="ftco-section bg-light" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(/img/imgq1.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4" >Đăng nhập thành viên</h3>
                                    <p class="text-danger">Chỉ có thành viên mới có thể đăng nhập</p>
                                </div>

                            </div>
                            @if ($errors->has('captcha_failed'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('captcha_failed') }}
                                </div>
                            @endif
                            <form action="{{ route('userLoginpost') }}" method="post">
                                @csrf
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="name_login">Tên đăng nhập</label>
                                    <input type="text" name="name_login" id="name_login"
                                        class="form-control @error('name_login') is-invalid @enderror"
                                        value="{{ old('name_login') }}" required>
                                    @error('name_login')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="cf-turnstile mt-3 text-center" data-sitekey="{{ env('SITE_KEY') }}" data-callback="javascriptCallback"></div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary text-center">Đăng nhập</button>
                            </form>
                            <a href="{{ route('user_home') }}">Quay lại trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src=" {{ asset('js/jquery1.min.js') }} "></script>
    <script src=" {{ asset('js/popper1.js') }} "></script>
    <script src="{{ asset('js/bootstrap1.min.js') }} "></script>
    <script src="{{ asset('js/main1.js') }} "></script>

</body>

</html>