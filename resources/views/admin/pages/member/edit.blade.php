@extends('admin.main')

@section('title')
Chỉnh sửa thành viên
@endsection

@section('content')
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Thành viên / Chỉnh sửa</h1>
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
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>
                        <form action="{{ route('membereditpost', ['id' => $editmember->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Tên thành viên</label>
                                    <input name="name_member" type="text" class="form-control" id="inputName"
                                        placeholder="Tên thành viên" value="{{  $editmember->name_member }}" required>
                                    @error('name_member')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail"
                                        placeholder="Email thành viên" value="{{  $editmember->Email }}" required>
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
                                    <label for="inputNumber">Số diện thoại</label>
                                    <input name="numberphone" type="text" class="form-control" id="inputNumber"
                                        placeholder="Số diện thoại thành viên" value="{{  $editmember->numberphone }}"
                                        required>
                                    @error('numberphone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputIDNumber">Số căn cước</label>
                                    <input name="ID_number_card" type="text" class="form-control" id="inputIDNumber"
                                        placeholder="Số căn cước thành viên" value="{{  $editmember->ID_number_card }}"
                                        required>
                                    @error('ID_number_card')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">Địa chỉ</label>
                                    <input name="address" type="text" class="form-control" id="inputAddress"
                                        placeholder="Địa chỉ thành viên" value="{{ $editmember->address }}" required>
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                            <a href="{{ route('memberlist') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection