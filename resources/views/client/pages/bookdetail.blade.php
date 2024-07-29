@extends('client.layout.main')

@section('title')
Kho sách
@endsection

@section('content')
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
                    <iframe src="{{ route('showbook', ['book_file_name' => basename($bookdetail->book_file)]) }}" width="100%" height="850px"></iframe>
                        <p><a href="{{ route('user_book') }}" class="btn btn-primary">Quay lại</a> <span
                                class="enrolled-count"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="probootstrap-cta">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">Get your admission now!</h2>
                <a href="#" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate"
                    data-animate-effect="fadeInLeft">Enroll</a>
            </div>
        </div>
    </div>
</section>

@endsection