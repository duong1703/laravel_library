<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập thành viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href=" {{ asset('css/style1.css') }} ">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(/img/imgq1.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Đăng nhập thành viên</h3>
                                    <p class="text-danger">Chỉ có thành viên mới có thể đăng nhập</p>
                                </div>
                               
                            </div>
                            <form action="#" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Tên đăng nhập</label>
                                    <input type="text" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Đăng
                                        nhập</button>
                                </div>

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