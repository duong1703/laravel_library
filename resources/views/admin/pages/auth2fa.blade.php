
@extends('admin.main')

@section('title')
Theo dõi truy cập
@endsection


@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Cột hiển thị trạng thái -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-header bg-gradient-secondary text-white text-center py-4">
                    <h4 class="mb-0 text-success">Trạng thái bảo mật</h4>
                </div>
                <div class="card-body p-4">
                    @if (auth()->user()->two_factor_confirmed_at)
                        <div class="alert alert-success">
                            <strong>Bảo mật 2FA đã được kích hoạt.</strong>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <strong>2FA chưa được bật.</strong>
                        </div>
                    @endif

                    <p class="mt-3">Trạng thái bảo mật của bạn giúp tăng cường sự an toàn của tài khoản. Kích hoạt 2FA
                        để bảo vệ thông tin cá nhân khỏi các truy cập trái phép.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <h4 class="mb-0 text-success">Cài đặt bảo mật 2FA</h4>
                </div>
                <div class="card-body p-4">
                    @if (auth()->user()->two_factor_confirmed_at)
                        @if (session('status') == 'two-factor-authentication-enabled')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Thành công!</strong> Xác thực 2FA đã được bật.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="mb-4">
                            <h5 class="fw-bold text-primary">Mã phục hồi của bạn:</h5>
                            <button class="btn btn-outline-primary mb-2" onclick="toggleRecoveryCodes()">Hiển thị/Ẩn
                                mã</button>
                            <ul id="recoveryCodes" class="list-group list-group-numbered" style="display:none">
                                @foreach (auth()->user()->recoveryCodes() as $code)
                                    <li class="list-group-item">{{ $code }}</li>
                                @endforeach
                            </ul>
                        </div>


                        <form action="{{ route('two-factor.disable') }}" method="post" class="text-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg mt-3">Tắt 2FA</button>
                        </form>

                    @elseif (auth()->user()->two_factor_secret)
                        <div class="text-center mb-4">
                            <h5 class="fw-bold text-secondary">Quét mã QR bằng ứng dụng xác thực:</h5>
                            <div class="d-inline-block p-3 border rounded bg-light shadow-sm">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>
                        </div>

                        <form action="{{ route('two-factor.confirm') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">Nhập mã xác thực</label>
                                <input type="text" name="code" id="code"
                                    class="form-control form-control-lg @error('code') is-invalid @enderror"
                                    placeholder="Nhập mã 6 chữ số" required>
                            </div>
                            <button type="submit" class="btn btn-info btn-lg w-100 mt-3">Xác nhận</button>
                        </form>

                    @else
                        <div class="text-center">
                            <h5 class="text-muted mb-3">Kích hoạt xác thực 2 bước để bảo mật tài khoản của bạn</h5>
                            <form action="{{ route('two-factor.enable') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg">Bật 2FA</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleRecoveryCodes() {
        const recoveryCodes = document.getElementById('recoveryCodes');
        if (recoveryCodes.style.display === 'none') {
            recoveryCodes.style.display = 'block';
        } else {
            recoveryCodes.style.display = 'none';
        }
    }
</script>

@endsection
