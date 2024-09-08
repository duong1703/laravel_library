@extends('client.layout.main')

@section('title')
Kho sách
@endsection

@section('content')
@if(Auth::guard('member')->check())
    <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left section-heading probootstrap-animate">
                    <h1>Tài liệu chi tiết</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row probootstrap-gutter0">
                        <div class="col-md-4" id="probootstrap-sidebar">
                            <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="image">
                                    <div class="image-bg">
                                        <img src="{{ asset($bookdetail->book_images) }}" class="img-fluid">
                                    </div>
                                </div>
                                <p>Tên sách: {{ $bookdetail->book_name }}</p>
                                <p>Tên tác giả: {{ $bookdetail->book_author }}</p>
                                <p>Nhà sản xuất: {{ $bookdetail->book_publisher }}</p>
                                <p>Năm sản xuất: {{ $bookdetail->book_year_of_manufacture }}</p>
                                <p>Số lượng sách: {{ $bookdetail->book_amount }}</p>
                                <p>Danh mục sách: {{ $bookdetail->book_category}}</p>
                            </div>
                        </div>
                        <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                            <iframe src="{{ route('showbook', ['book_file_name' => basename($bookdetail->book_file)]) }}"
                                width="100%" height="850px"></iframe>
                            <p><a href="{{ route('user_book') }}" class="btn btn-primary">Quay lại</a> <span
                                    class="enrolled-count"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h2>Để lại bình luận cho tài liệu này</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Thành công!',
                            text: '{{ session('success') }}',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            timer: 5000,
                            timerProgressBar: true
                        });
                    });
                </script>
            @endif
            <form action="{{ route('user_comment', ['id' => $bookdetail->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="book_id" value="{{ $bookdetail->id }}">
                    <input type="hidden" name="member_id" value="{{ Auth::guard('member')->user()->id }}">
                    <label for="comment" class="form-label">Bình luận</label>
                    <textarea name="comment" id="comment">Welcome to TinyMCE!</textarea>
                </div>
                <!-- <button type="submit" class="btn btn-primary" style="margin-top:25px">Gửi bình luận</button> -->
                <button type="submit" class="btn btn-success mt-4 rounded-4 " style="margin-top:25px">Gửi bình luận</button>
            </form>
        </div>
    </section>
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/hbozepm8v83oquejurp97p1x4p1eymqxvifr4r4izmvfi34i/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- Place the following <script> tag in your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@else
    <p class="alert alert-danger text-center" role="alert" style="margin-top:25px">Bạn cần đăng nhập để xem thêm thông tin
        !. Vui lòng đăng nhập tại <a href="{{ route('user_login') }}">đây</a>

@endif

    @endsection