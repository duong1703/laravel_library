@extends('admin.main')

@section('title')
Thêm mới thành viên
@endsection

@section('content')
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Thành viên / Thêm mới</h1>
        <div class="row">
            <div class="col-xl-12">
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin thành viên </div>
                    </div>
                    <div class="card-body ">
                        <div id="add-alerts">
                            @if (session('error'))
                                <script>
                                    Swal.fire({
                                        text: "{{ session('error') }}",
                                        icon: "error"
                                    });
                                </script>
                            @endif
                            @if (session('success'))
                                <script>
                                    Swal.fire({
                                        text: "{{ session('success') }}, Thông tin đăng ký sẽ được gửi qua email người dùng!",
                                        icon: "success"
                                    });
                                </script>
                            @endif
                        </div>
                        <form action="{{ route('memberpost') }}" method="POST">
                            @csrf
                            <input type="hidden" name="member_id" id="member_id" value="{{ Auth::id() }}">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Tên thành viên</label>
                                    <input name="name_member" type="text" class="form-control" id="inputName"
                                        placeholder="Tên thành viên" value="{{ old('name_member') }}" required>
                                    @error('name_member')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputNameLogin">Tên đăng nhập</label>
                                    <input name="name_login" type="text" class="form-control" id="inputNameLogin"
                                        placeholder="Tên đăng nhập" value="{{ old('name_login') }}" required>
                                    @error('name_login')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword">Mật khẩu đăng nhập</label>
                                    <div class="input-group">
                                        <input name="password" type="text" class="form-control" id="inputPassword"
                                            placeholder="Mật khẩu đăng nhập" value="{{ old('password') }}" required>
                                        <button type="button" class="btn btn-secondary" id="generatePassword">Generate
                                            Password</button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputEmail">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail"
                                        placeholder="Email thành viên" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Quyền</label>
                                    <select name="role" id="inputState" class="form-control" required>
                                        <option value="Thành viên" {{ old('role') == 'Thành viên' ? 'selected' : '' }}>
                                            Thành viên</option>
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="date">Ngày, tháng, năm sinh</label>
                                    <input name="born" type="date" class="form-control" id="date"
                                        value="{{ old('born') }}" required>
                                    @error('born')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputNumber">Số diện thoại</label>
                                    <input name="numberphone" type="text" class="form-control" id="inputNumber"
                                        placeholder="Số diện thoại thành viên" value="{{ old('numberphone') }}"
                                        required>
                                    @error('numberphone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputIDNumber">Số căn cước</label>
                                    <input name="ID_number_card" type="text" class="form-control" id="inputIDNumber"
                                        placeholder="Số căn cước thành viên" value="{{ old('ID_number_card') }}"
                                        required>
                                    @error('ID_number_card')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">Địa chỉ</label>
                                    <input name="address" type="text" class="form-control" id="inputAddress"
                                        placeholder="Địa chỉ thành viên" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                            <a href="{{ route('memberlist') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementById('generatePassword').addEventListener('click', function () {
        function generatePassword(length = 9) {
            const characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            let randomPassword = '';
            for (let i = 0; i < length; i++) {
                randomPassword += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return randomPassword;
        }

        const password = generatePassword(9);
        document.getElementById('inputPassword').value = password;
    });
</script>

@endsection