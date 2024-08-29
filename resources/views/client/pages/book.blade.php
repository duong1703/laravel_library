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
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <h3>TÌM KIẾM MỘT CÁI GÌ ĐÓ !</h3>
            <form class="d-flex w-50" role="search" style="margin-bottom:50px" method="get"
                action="{{ route('search') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success hidden" type="submit">Tìm kiếm</button>
            </form>
        </div>
        <form action="" method="GET">
            <div class="row g-3 justify-content-center align-items-center" style="height: 100px;">
                <!-- Select Danh mục cha -->
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <label for="parentCategory" class="form-label">Danh mục cha</label>
                    <select id="parentCategory" name="parent_category_id" class="form-control">
                        <option selected>Chọn danh mục cha</option>

                    </select>
                </div>

                <!-- Select Danh mục con -->
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <label for="childCategory" class="form-label">Danh mục con</label>
                    <select id="childCategory" name="child_category_id" class="form-control">
                        <option selected>Chọn danh mục con</option>
                        <!-- Các tùy chọn sẽ được điền qua AJAX -->
                    </select>
                </div>

                <!-- Button Tìm kiếm -->
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-outline-primary" style="margin-top:30px">Tìm kiếm</button>
                </div>
            </div>
        </form>

    </div>

    <div class="container mt-5">
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
                                <span class="probootstrap-meta"><i class="icon-calendar2"></i> {{ $book->created_at }}</span>
                                <h3 class="text-success">{{ $book->book_name }}</h3>
                                <p class="text-primary">{{ $book->book_author }}</p>
                                <p class="text-success">Trạng thái sách: {{ $book->book_status }}</p>
                                @if(Session::has('member_name_login'))
                                    <p>
                                        <a href="{{ route('user_bookdetail_id', ['id' => $book->id]) }}"
                                            class="btn btn-primary {{ $book->book_status === 'Unavailable' ? 'btn-secondary disabled' : 'btn-primary' }}"
                                            id="readBookBtn">Đọc tài liệu chi tiết</a>
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

@endsection