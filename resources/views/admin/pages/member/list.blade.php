@extends('admin.main')

@section('title')
Danh sách thành viên
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
        <h1 class="dash-title">Trang chủ / Thành viên / Danh sách</h1>
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
                        <div class="easion-card-title"> Danh sách thành viên </div>
                    </div>
                    <div class="card-body ">
                        <table id="datatable" class="cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Tên TV</th>
                                    <th scope="col">Tên ĐN</th>
                                    <th scope="col">Mật khẩu</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Quyền</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">CCCD</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody  style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 200px;">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($data as $member)

                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $member->name_member }}</td>
                                        <td>{{ $member->name_login }}</td>
                                        <td>{{ $member->password }}</td>
                                        <td>{{ $member->Email }}</td>
                                        <td>{{ $member->role }}</td>
                                        <td>{{ $member->born }}</td>
                                        <td>{{ $member->numberphone }}</td>
                                        <td>{{ $member->ID_number_card }}</td>
                                        <td>{{ $member->address }}</td>

                                        <td class="text-center ">
                                            <div class="action-buttons">
                                                <a href="{{ route('memberedit', ['id' => $member->id]) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('memberdelete', ['id' => $member->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
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
@endsection