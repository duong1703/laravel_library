@extends('client.layout.main')

@section('title')
Kho sách
@endsection

@section('content')
<style>
    .book-status {
        display: inline-block;
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 50px;
        color: white;
    }

    .book-status.available {
        background-color: #28a745;
    }

    .book-status.unavailable {
        background-color: #dc3545;
    }
</style>

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
        <h3>Danh mục sách</h3>
        @foreach ($categories as $cat)
            <a href="{{ route('books.filterByCategory', ['category' => urlencode($cat->book_category)]) }}"
                class="d-flex w-50 btn {{ isset($category) && $category === $cat->book_category ? 'btn-primary' : 'btn-success' }}"
                style="margin-bottom:50px">
                {{ $cat->book_category }} ({{ $cat->book_count }})
            </a>
        @endforeach

        @if(isset($category))
            <h4>Danh mục đang chọn: <span class="text-primary">{{ $category }}</span></h4>
        @endif

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
                                <span class="probootstrap-meta">
                                    <i class="icon-calendar2"></i>
                                    {{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i') }}
                                </span>
                                <h3 class="text-success">{{ $book->book_name }}</h3>
                                <p class="text-primary">{{ $book->book_author }}</p>
                                <p class="text-primary">ID sách: {{ $book->id }}</p>
                                <p class="text-primary">Danh mục sách: {{ $book->book_category }}</p>
                                <p class="book-status {{ $book->book_status === 'Unavailable' ? 'unavailable' : 'available' }}">
                                    Trạng thái sách: {{ $book->book_status }}
                                </p>

                                @if(Auth::guard('member')->check())
                                    <p>
                                        <a href="javascript:void(0);" onclick="saveBookRead('{{ $book->id }}')"
                                            class="btn btn-primary {{ $book->book_status === 'Unavailable' ? 'btn-secondary disabled' : 'btn-primary' }}">
                                            Đọc tài liệu chi tiết
                                        </a>
                                    </p>

                                @else
                                    <p>
                                        <a href="{{ route('user_login') }}" class="btn btn-primary">Đăng nhập để đọc tài liệu</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-center text-center">
            {{ $books->appends(['category' => $category ?? ''])->links('vendor.pagination.bootstrap-4') }}
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
            error: function (xhr, status, error) {
                alert('Không thể kết nối đến server.');
            }
        });
    }
</script>


@endsection