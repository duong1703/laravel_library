@extends('client.layout.main')

@section('title')
Trang chủ
@endsection

@section('content')

<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
                <h2>Chào mừng bạn tới thư viện điện tử EPU IT</h2>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="probootstrap-flex-block">
                    <div class="probootstrap-text probootstrap-animate">
                        <h3>Thông tin về trường</h3>
                        <p>Tiền thân của Trường Đại học Điện lực là Trường Kỹ nghệ Thực hành được thành lập năm 1898.
                            Sau đó Trường được tách thành Trường Kỹ thuật I và trường Kỹ thuật II.</p>
                        <p><a href="{{ route('info_user') }}" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>Một số sách phổ biến</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data as $book)
                <div class="col-md-6 mb-4">
                    <div class="probootstrap-service-2 probootstrap-animate">
                        <div class="image">
                            <div class="image-bg">
                                <img src="{{ asset($book->book_images)  }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="text">
                            <span class="probootstrap-meta"><i class="icon-calendar2"></i>
                                {{ $book->created_at }}</span>
                            <h3>{{ $book->book_name }}</h3>
                            <h3> Tác giả: {{ $book->book_author }}</h3>
                            @if(Session::has('member_name_login'))
                            <p><a href="{{ route('user_bookdetail_id', ['id' => $book->id]) }}"
                                    class="btn btn-primary">Đọc tài liệu chi tiết</a> <span class="enrolled-count">
                                    @else
                                    <a href="{{ route('user_login') }}" class="btn btn-primary">Đăng nhập để đọc tài
                                        liệu</a>
                                    @endif

                                </span></p>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 2 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
        </div>

    </div>
</section>

<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>Tại sao nên chọn trường Đại học Điện Lực ?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-checkmark"></i></div>
                    <div class="text">
                        <h3>1. SỨ MẠNG</h3>
                        <p>Trường Đại học Điện lực là trường đại học công lập đa ngành, đào tạo nguồn nhân lực chất
                            lượng cao; nghiên cứu khoa học, phát triển công nghệ, tư vấn chính sách, chuyển giao tri
                            thức, đặc biệt trong lĩnh vực năng lượng, góp phần xây dựng, phát triển đất nước và hội nhập
                            quốc tế.</p>
                    </div>
                </div>
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-checkmark"></i></div>
                    <div class="text">
                        <h3>2. TẦM NHÌN</h3>
                        <p>Là trường đại học đa ngành theo định hướng ứng dụng có uy tín trong và ngoài nước, từng bước
                            khẳng định vị thế hàng đầu Việt Nam trong lĩnh vực năng lượng.</p>
                    </div>
                </div>
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-checkmark"></i></div>
                    <div class="text">
                        <h3>3. GIÁ TRỊ CỐT LÕI</h3>
                        <p>Trách nhiệm - Sáng tạo - Hiệu quả.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-checkmark"></i></div>
                    <div class="text">
                        <h3>4. MỤC TIÊU</h3>
                        <p>Trở thành trường đại học theo ứng dụng hàng đầu Việt Nam, theo mô hình tự chủ toàn diện, hội
                            nhập với nền giáo dục tiên tiến khu vực và quốc tế. Người học được đào tạo toàn diện, đáp
                            ứng tốt yêu cầu của thị trường lao động, có khả năng học tập suốt đời, có năng lực sáng tạo
                            và khởi nghiệp. Kết quả nghiên cứu khoa học đáp ứng tốt yêu cầu thực tiễn, góp phần vào sự
                            nghiệp công nghiệp hóa, hiện đại hóa đất nước.</p>
                    </div>
                </div>

                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-checkmark"></i></div>
                    <div class="text">
                        <h3>5. TRIẾT LÝ GIÁO DỤC</h3>
                        <p>Giáo dục toàn diện, vững nền tảng, bền tương lai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection