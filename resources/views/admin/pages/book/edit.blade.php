@extends('admin.main')

@section('title')
Chỉnh sửa thông tin sách
@endsection

@section('content')
<style>
    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    #name {
        pointer-events: none;
        background-color: #e9ecef;
    }

    .text-success {
        color: #28a745 !important;
    }

    .text-warning {
        color: #ffc107 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }
</style>
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Sách / Chỉnh sửa</h1>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                        <div class="easion-card-title"> Chỉnh sửa thông tin sách </div>
                    </div>
                    <div class="card-body ">
                        <form id="uploadForm" action="{{ route('bookeditpost', ['id' => $editBook->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Tên sách</label>
                                <input type="text" class="form-control" id="book_name" name="book_name"
                                    placeholder="Tên của sách" value="{{ old('book_name', $editBook->book_name) }}"
                                    required>
                                @error('book_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Tải lên ảnh bìa sách</label>
                                <input class="form-control" type="file" id="name" name="book_images">
                                @error('book_images')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_author" class="form-label">Tên tác giả</label>
                                <input type="text" class="form-control" id="book_author" name="book_author"
                                    placeholder="Tên tác giả" value="{{ old('book_author', $editBook->book_author) }}"
                                    required>
                                @error('book_author')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_file" class="form-label">Tải lên file tài liệu <span
                                        class="text-danger">( .pdf, word )</span></label>
                                <input type="file" class="form-control" id="name" name="book_file">
                                @error('book_file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_publisher">Nhà xuất bản</label>
                                <input name="book_publisher" type="text" class="form-control" id="book_publisher"
                                    value="{{ old('book_publisher', $editBook->book_publisher) }}"
                                    placeholder="Nhập tên nhà xuất bản" required>
                                @error('book_publisher')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date">Ngày, tháng, năm xuất bản</label>
                                <input name="book_year_of_manufacture" type="date" class="form-control"
                                    id="book_year_of_manufacture"
                                    value="{{ old('book_year_of_manufacture', $editBook->book_year_of_manufacture) }}"
                                    required>
                                @error('book_year_of_manufacture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_amount" class="form-label">Số lượng sách</label>
                                <input type="text" class="form-control" id="book_amount" name="book_amount"
                                    placeholder="Số lượng sách" value="{{ old('book_amount', $editBook->book_amount) }}"
                                    required>
                                @error('book_amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_category">Danh mục sách</label>
                                <input type="text" class="form-control" id="book_category" name="book_category"
                                    placeholder="Danh mục sách"
                                    value="{{ old('book_category', $editBook->book_category) }}" required>
                                @error('book_category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="book_status">Trạng thái sách</label>
                                <select name="book_status" id="book_status" class="form-control" required>
                                    <option value="active" {{ $editBook->book_status == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ $editBook->book_status == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('book_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Cập nhật</button>
                            <a href="{{ route('booklist') }}" class="btn btn-danger">Quay lại</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookStatusSelect = document.getElementById('book_status');
        updateStatusColor(bookStatusSelect);
        bookStatusSelect.addEventListener('change', function () {
            updateStatusColor(this);
        });

        function updateStatusColor(selectElement) {
            selectElement.classList.remove('text-success', 'text-warning', 'text-danger');

            if (selectElement.value === 'available') {
                selectElement.classList.add('text-success');
            } else if (selectElement.value === 'lost') {
                selectElement.classList.add('text-danger');
            }
        }
    });
</script>
@endsection