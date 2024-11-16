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
                        <table id="datatable" class="cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">id</th>
                                    <th class="text-center" scope="col">Người quản lý</th>
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
                            <tbody
                                style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 200px;">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($data as $book)
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td class="text-center">{{ $book->admin ? $book->admin->name : 'Không có người quản lý'  }}</td>
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
                                        <td class="text-center align-middle">
                                            <span
                                                class="badge rounded-pill {{ $book->book_status === 'Unavailable' ? 'bg-danger text-white' : 'bg-success text-white' }}">
                                                {{ $book->book_status }}
                                            </span>
                                        </td>

                                        <td class="text-center">{{date($book->created_at) }}</td>
                                        <td >
                                            <a href="{{ route('bookedit', ['id' => $book->id]) }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#previewModal"
                                                data-file-url="{{ route('showbook', ['book_file_name' => basename($book->book_file)]) }}"
                                                data-file-type="{{ pathinfo($book->book_file, PATHINFO_EXTENSION) }}">
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
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="previewModalLabel">Xem Trước Tài Liệu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe id="previewFrame"
                                            style="width: 100%; height: 600px; border: none;"></iframe>
                                        <div id="noPreview" class="text-center d-none">
                                            <p>Không thể xem trước tài liệu này.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
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

    document.addEventListener('DOMContentLoaded', () => {
        const previewModal = document.getElementById('previewModal');

        previewModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const fileUrl = button.getAttribute('data-file-url');
            const fileType = button.getAttribute('data-file-type');
            const previewFrame = document.getElementById('previewFrame');
            const noPreview = document.getElementById('noPreview');

            if (fileType === 'pdf') {
                previewFrame.src = fileUrl;
                previewFrame.classList.remove('d-none');
                noPreview.classList.add('d-none');
            } else if (fileType === 'docx') {
                const viewerUrl = `https://view.officeapps.live.com/op/view.aspx?src=${encodeURIComponent(fileUrl)}`;
                previewFrame.src = viewerUrl;
                previewFrame.classList.remove('d-none');
                noPreview.classList.add('d-none');
            } else {
                previewFrame.src = '';
                previewFrame.classList.add('d-none');
                noPreview.classList.remove('d-none');
            }
        });
    });

</script>