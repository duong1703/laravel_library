@extends('admin.main')

@section('title')
Danh sách quản trị viên
@endsection

@section('content')
<style>
    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;

        /* {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        } */
    }
</style>
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Quản trị viên / Danh Sách</h1>
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
                        <div class="easion-card-title"> Danh sách quản trị viên </div>
                    </div>
                    <div class="card-body ">
                        <table id="datatable" class="cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">id</th>
                                    <th class="text-center" scope="col">Tên</th>
                                    <th class="text-center" scope="col">Email</th>
                                    <th class="text-center" scope="col">Xác minh 2FA</th>
                                    <th class="text-center" scope="col">Quyền</th>
                                    <th class="text-center" scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody
                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 200px;">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($data as $admin)

                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td class="text-center">{{ $admin->name }}</td>
                                        <td class="text-center">{{ $admin->email }}</td>
                                        <td class="text-center">{{ $admin->two_factor_confirmed_at ? $admin->two_factor_confirmed_at : 'Chưa xác minh 2FA'  }}</td>
                                        <td class="text-center">{{ $admin->role }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('adminedit', ['id' => $admin->id]) }}"
                                                class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admindelete', ['id' => $admin->id]) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete(this)">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function confirmDelete(button) {
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: 'Hành động này không thể hoàn tác!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tìm form chứa hành động xóa và submit
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
@endsection