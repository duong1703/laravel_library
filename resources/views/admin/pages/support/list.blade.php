@extends('admin.main')

@section('title')
Hỗ trợ từ xa
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
        <h1 class="dash-title">Trang chủ / Tin nhắn hỗ trợ / Danh sách</h1>
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
                        <div class="easion-card-title"> Danh sách tin nhắn </div>
                    </div>
                    <div class="card-body ">
                        <table id="datatable" class="cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">id</th>
                                    <th class="text-center" scope="col">Tên thành viên</th>
                                    <th class="text-center" scope="col">Email</th>
                                    <th class="text-center" scope="col">Mã sinh viên</th>
                                    <th class="text-center" scope="col">Nội dung tin nhắn</th>
                                    <th class="text-center" scope="col">Nội dung trả lời</th>
                                    <th class="text-center" scope="col">Trạng thái</th>
                                    <th class="text-center" scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach($data as $message)
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td class="text-center">{{ $message->fullname }}</td>
                                        <td class="text-center">{{ $message->email }}</td>
                                        <td class="text-center">{{ $message->ID_student }}</td>
                                        <td class="text-center">{{ $message->message }}</td>
                                        <td class="text-center">{{ $message->reply }}</td>
                                        <td class="text-center ">{{ $message->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('editMessage',['id' => $message->id] ) }}"
                                                class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('messagedelete',['id' => $message->id] ) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
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


@endsection