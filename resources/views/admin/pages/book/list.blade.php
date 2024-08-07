@extends('admin.main')

@section('title')
Danh sách sách
@endsection

@section('content')
<style>
.auto-height-table {
    width: 100%;
}

.auto-height-table th,
.auto-height-table td {
    vertical-align: middle;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.action-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.action-buttons .btn {
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.action-buttons form {
    margin: 0;
}

.table th,
.table td {
    border: 1px solid #dee2e6;
}
</style>
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Sách / Danh sách</h1>
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
                        <div class="easion-card-title">Danh sách về sách</div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="cell-border " style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">id</th>
                                    <th class="text-center" scope="col">Bìa sách</th>
                                    <th class="text-center" scope="col">Tên sách</th>
                                    <th class="text-center" scope="col">Tác giả</th>
                                    <th class="text-center" scope="col">File sách</th>
                                    <th class="text-center" scope="col">Năm XB</th>
                                    <th class="text-center" scope="col">NXB</th>
                                    <th class="text-center" scope="col">Số lượng</th>
                                    <th class="text-center" scope="col">Danh mục</th>
                                    <th class="text-center" scope="col">Trạng thái</th>
                                    <th class="text-center" scope="col">Ngày tạo</th>
                                    <th class="text-center" scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($data as $book)
                                <tr>
                                    <td class="text-center">{{ $count++ }}</td>
                                    <td>
                                        <img src="{{ asset($book->book_images) }}" alt="" class="img-fluid"
                                            height="120">
                                    </td>
                                    <td class="text-center">{{ $book->book_name }}</td>
                                    <td class="text-center">{{ $book->book_author }}</td>
                                    <td class="text-center">{{ $book->book_file }}</td>
                                    <td class="text-center">{{ $book->book_year_of_manufacture }}</td>
                                    <td class="text-center">{{ $book->book_publisher }}</td>
                                    <td class="text-center">{{ $book->book_amount }}</td>
                                    <td class="text-center">{{ $book->book_category }}</td>
                                    <td class="text-center status-cell">{{ $book->book_status }}</td>
                                    <td class="text-center">{{ $book->created_at }}</td>
                                    <td class="text-center action-buttons mt-3">
                                        <a href="{{ route('bookedit', ['id' => $book->id]) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#previewModal"
                                            data-file-url="{{ route('showbook', ['book_file_name' => basename($book->book_file)]) }}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <form action="{{ route('bookdelete', ['id' => $book->id]) }}" method="POST"
                                            style="display:inline;">
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
                        <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="previewModalLabel">Xem trước tài liệu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe id="documentViewer" src="" style="width: 100%; height: 600px;"
                                            frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#datatable').DataTable();

    var previewModal = document.getElementById('previewModal');
    previewModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var fileUrl = button.getAttribute('data-file-url');

        var documentViewer = previewModal.querySelector('#documentViewer');
        documentViewer.src = fileUrl;
    });

    previewModal.addEventListener('hidden.bs.modal', function(event) {
        var documentViewer = previewModal.querySelector('#documentViewer');
        documentViewer.src = '';
    });
});
</script>

