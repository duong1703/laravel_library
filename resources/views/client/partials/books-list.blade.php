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
                        </p>
                    @else
                        <a href="{{ route('user_login') }}" class="btn btn-primary">Đăng nhập để đọc tài liệu</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
