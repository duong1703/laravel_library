@extends('client.layout.main')

@section('title')
Kho sách
@endsection

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
                <h1>Thư viện sách tham khảo</h1>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-6 mb-4">
                    <div class="probootstrap-service-2 probootstrap-animate">
                        <div class="image">
                            <div class="image-bg">
                                <img src="{{ asset($book->book_images) }}" class="img-fluid" alt="{{ $book->book_name }}">
                            </div>
                        </div>
                        <div class="text">
                            <span class="probootstrap-meta"><i class="icon-calendar2"></i> {{ $book->created_at }}</span>
                            <h3 class="text-success">{{ $book->book_name }}</h3>
                            <p class="text-primary">{{ $book->book_author }}</p>
                            <p class="text-success">Trạng thái sách: {{ $book->book_status }}</p>
                            <p><a href="#" class="btn btn-primary">Đọc tài liệu</a> <span class="enrolled-count">2,928
                                    students enrolled</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center text-center">
        {{ $books->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

</section>

@endsection