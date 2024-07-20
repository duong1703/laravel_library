@extends('admin.main')

@section('title')
Chỉnh sửa quản trị viên
@endsection

@section('content')
<style>
.action-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
</style>
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Quản trị viên / Chỉnh sửa</h1>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Chỉnh sửa quản trị viên </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('admineditpost', ['id' => $editAdmin->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên quản trị</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên quản trị viên"
                                    value="{{ $editAdmin -> name }}" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email quản trị</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Email quản trị viên" name="email" value="{{ $editAdmin -> email }}" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="admin_password" class="form-label">Mật khẩu quản trị</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Mật khẩu quản trị viên" name="password"  required>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                            <a href="{{ route('adminlist') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection