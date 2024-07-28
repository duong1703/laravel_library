@extends('admin.main')

@section('title')
Thêm mới sách
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
                        <form id="uploadForm" action="{{ route('bookpost') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Tên sách</label>
                                <input type="text" class="form-control" id="book_name" name="book_name"
                                    placeholder="Tên của sách" value="{{ old('book_name') }}" required>
                                @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Tải lên ảnh bìa sách</label>
                                <input class="form-control" type="file" id="book_images" name="book_images" required>
                                @error('book_images')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_author" class="form-label">Tên tác giả</label>
                                <input type="text" class="form-control" id="book_author" name="book_author"
                                    placeholder="Tên tác giả" value="{{ old('book_author') }}" required>
                                @error('book_author')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_file" class="form-label">Tải lên file tài liệu <span
                                        class="text-danger">( .pdf, word )</span></label>
                                <input type="file" class="form-control" id="book_file" name="book_file" required>
                                @error('book_file')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_publisher">Nhà xuất bản</label>
                                <input name="book_publisher" type="text" class="form-control" id="book_publisher"
                                    value="{{ old('book_publisher') }}" placeholder="Nhập tên nhà xuất bản" required>
                                @error('book_publisher')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date">Ngày, tháng, năm xuất bản</label>
                                <input name="book_year_of_manufacture" type="date" class="form-control" id="date"
                                    value="{{ old('book_year_of_manufacture') }}" required>
                                @error('book_year_of_manufacture')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_amount" class="form-label">Số lượng sách</label>
                                <input type="text" class="form-control" id="book_amount" name="book_amount"
                                    placeholder="Số lượng sách" value="{{ old('book_amount') }}" required>
                                @error('book_amount')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_category">Danh mục sách</label>
                                <select name="book_category" id="book_category" class="form-control"
                                    value="{{ old('book_category') }}" required>
                                    <option selected>Lựa chọn danh mục sách</option>
                                    @foreach ($book_category as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('book_category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_status">Trạng thái sách</label>
                                <select name="book_status" id="book_status" class="form-control"
                                    value="{{ old('book_status') }}" required>
                                    <option selected>Lựa chọn trạng thái sách</option>
                                    <option value="available" class="text-success">Có sẵn</option>
                                    <option value="lost" class="text-danger">Mất</option>
                                </select>
                                @error('book_status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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