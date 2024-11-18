<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/?size=100&id=119436&format=png&color=000000">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/easion.css') }}">
    <title>Xác minh 2FA</title>
    <style>
        .code-input {
            width: 40px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .code-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>

<body class="bg-primary">
    <div class="form-screen">
        <a href="" class="easion-logo">
            <img src="{{ asset('img/CNTTIT.png') }}" width="210" height="75">
        </a>
        <p class="fs-1 text-light">THƯ VIỆN ĐIỆN TỬ KHOA CÔNG NGHỆ THÔNG TIN</p>
        <div class="card account-dialog rounded-lg">
            <div class="card-header bg-primary text-white rounded-lg"> Xác nhận mã 2FA</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('two-factor.login.store')}}" method="post" id="codeForm">
                    @csrf
                    <div class="code-container">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" maxlength="1" class="form-control code-input" id="code{{ $i }}" required>
                        @endfor
                    </div>
                    <input type="hidden" name="code" id="hiddenCodeInput">
                    @error('code')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary btn-block rounded-lg mt-3">Xác nhận</button>
                    <div class="mt-2 text-center">
                        <a href="{{ route('auth2fa') }}">Trở về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const codeInputs = document.querySelectorAll('.code-input');
        const hiddenCodeInput = document.getElementById('hiddenCodeInput');

        codeInputs.forEach((input, index, array) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < array.length - 1) {
                    array[index + 1].focus();
                }
                if (input.inputType === 'deleteContentBackward' && index > 0) {
                    array[index - 1].focus();
                }
                // Hợp nhất giá trị từ các ô nhập vào một chuỗi duy nhất
                let codeValue = '';
                array.forEach(inp => codeValue += inp.value);
                hiddenCodeInput.value = codeValue;
            });
        });
    </script>
</body>

</html>