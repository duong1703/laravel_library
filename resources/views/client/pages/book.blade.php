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
<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thư viện sách</li>
    </ol>
</nav>

<section class="probootstrap-section">
    <div class="container">
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <h3>TÌM KIẾM SÁCH BẠN CẦN !</h3>
            <form class="d-flex w-50" role="search" style="margin-bottom:50px" method="get"
                action="{{ route('search') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm tài liệu, tác giả ..." aria-label="Search">
                <button class="btn btn-outline-success hidden" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>



    <div class="container">
        <h3>Danh mục sách</h3>
        @foreach ($categories as $category)
            <button class="d-flex w-50 btn btn-success" style="margin-bottom:50px">
                {{ $category->book_category }} ( {{ $category->book_count }} )</span>
            </button>
        @endforeach

        @if($books->isEmpty())
            <p>Không có kết quả nào.</p>
        @else
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
                                <span class="probootstrap-meta"><i class="icon-calendar2"></i> {{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i') }}</span>
                                <h3 class="text-success">{{ $book->book_name }}</h3>
                                <p class="text-primary">{{ $book->book_author }}</p>
                                <p class="text-primary">ID sách: {{ $book->id }}</p>
                                <p class="text-primary">Danh mục sách: {{ $book->book_category }}</p>
                                <p class="text-success">Trạng thái sách: {{ $book->book_status }}</p>
                                @if(Auth::guard('member')->check())
                                    <p>
                                        <a href="{{ route('user_bookdetail_id', ['id' => $book->id]) }}"
                                            class="btn btn-primary {{ $book->book_status === 'Unavailable' ? 'btn-secondary disabled' : 'btn-primary' }}"
                                            id="readBookBtn" onclick="saveBookRead({{ $book->id }})">
                                            Đọc tài liệu chi tiết
                                        </a>

                                @else
                                    <a style="hidden" href="{{ route('user_login') }}" class="btn btn-primary">Đăng nhập để đọc
                                        tài liệu</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="d-flex justify-content-center text-center">
            {{ $books->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

</section>
<script>
    function saveBookRead(bookId) {
        event.preventDefault();
        $.ajax({
            url: '{{ route('save.book.read') }}',
            method: 'POST',
            data: {
                book_id: bookId,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = '{{ route('user_bookdetail_id', ['id' => ':id']) }}'.replace(':id', bookId);
                } else {
                    alert('Có lỗi xảy ra khi lưu lượt đọc sách.');
                }
            },
            error: function () {
                alert('Không thể kết nối đến server.');
            }
        });
    }
</script>

@endsection