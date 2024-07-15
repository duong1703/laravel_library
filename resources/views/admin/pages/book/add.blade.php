@extends('admin.main')

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
        <h1 class="dash-title">Trang chủ / Sách / Thêm mới</h1>
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
                        <div class="easion-card-title"> Thêm mới sách </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('bookpost') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Tên sách</label>
                                <input type="text" class="form-control" id="book_name" placeholder="Tên của sách">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Tải lên ảnh bìa sách</label>
                                <input class="form-control" type="file" id="book_images">
                            </div>
                            <div class="mb-3">
                                <label for="book_author" class="form-label">Tên tác giả</label>
                                <input type="text" class="form-control" id="book_author" placeholder="Tên tác giả">
                            </div>
                            <div class="mb-3">
                                <label for="book_file" class="form-label">Tải lên file tài liệu <span
                                        class="text-danger">( .pdf )</span></label>
                                <input type="file" class="form-control" id="book_file" name="pdfFile" accept=".pdf"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="inputState">Nhà xuất bản</label>
                                <select name="book_publisher" id="book_publisher" class="form-control" required>
                                    <option selected>Lựa chọn nhà xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date">Ngày, tháng, năm xuất bản</label>
                                <input name="book_year_of_manufacture" type="date" class="form-control" id="date" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="book_amount" class="form-label">Số lượng sách</label>
                                <input type="text" class="form-control" id="book_amount" placeholder="Số lượng sách">
                            </div>
                            <div class="mb-3">
                                <label for="book_category">Danh mục sách</label>
                                <select name="book_category" id="book_category" class="form-control" required>
                                    <option selected>Lựa chọn danh mục sách</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="book_status">Trạng thái sách</label>
                                <select name="book_status" id="book_status" class="form-control" required>
                                    <option selected>Lựa chọn trạng thái sách</option>
                                    <option selected class="text-success">Có sẵn</option>
                                    <option selected class="text-warning">Đang mượn</option>
                                    <option selected class="text-danger">Mất</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                            <a href="{{ route('booklist') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection