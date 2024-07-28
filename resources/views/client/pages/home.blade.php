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
                        <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>
                    <div class="probootstrap-image probootstrap-animate"
                        style="background-image: url(img/slider_3.jpg)">
                        <a href="https://vimeo.com/45830194" class="btn-video popup-vimeo"><i
                                class="icon-play3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section" id="probootstrap-counter">
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                <div class="probootstrap-counter-wrap">
                    <div class="probootstrap-icon">
                        <i class="icon-users2"></i>
                    </div>
                    <div class="probootstrap-text">
                        <span class="probootstrap-counter">
                            <span class="js-counter" data-from="0" data-to="20203" data-speed="5000"
                                data-refresh-interval="50">1</span>
                        </span>
                        <span class="probootstrap-counter-label">Students Enrolled</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                <div class="probootstrap-counter-wrap">
                    <div class="probootstrap-icon">
                        <i class="icon-user-tie"></i>
                    </div>
                    <div class="probootstrap-text">
                        <span class="probootstrap-counter">
                            <span class="js-counter" data-from="0" data-to="139" data-speed="5000"
                                data-refresh-interval="50">1</span>
                        </span>
                        <span class="probootstrap-counter-label">Certified Teachers</span>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
                <div class="probootstrap-counter-wrap">
                    <div class="probootstrap-icon">
                        <i class="icon-library"></i>
                    </div>
                    <div class="probootstrap-text">
                        <span class="probootstrap-counter">
                            <span class="js-counter" data-from="0" data-to="99" data-speed="5000"
                                data-refresh-interval="50">1</span>%
                        </span>
                        <span class="probootstrap-counter-label">Passing to Universities</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">

                <div class="probootstrap-counter-wrap">
                    <div class="probootstrap-icon">
                        <i class="icon-smile2"></i>
                    </div>
                    <div class="probootstrap-text">
                        <span class="probootstrap-counter">
                            <span class="js-counter" data-from="0" data-to="100" data-speed="5000"
                                data-refresh-interval="50">1</span>%
                        </span>
                        <span class="probootstrap-counter-label">Parents Satisfaction</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section
    class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section"
    style="background-image: url(img/slider_2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
                <h2 class="mb0">Highlights</h2>
            </div>
        </div>
    </div>
    <div class="probootstrap-tab-style-1">
        <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
            <li class="active"><a data-toggle="tab" href="#featured-news">Featured News</a></li>
            <li><a data-toggle="tab" href="#upcoming-events">Upcoming Events</a></li>
        </ul>
    </div>
</section> -->

<!-- <section class="probootstrap-section probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="tab-content">

                    <div id="featured-news" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel" id="owl1">
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_3.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, ut.
                                                </p>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>

                                            </div>
                                        </a>
                                    </div>
                                
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_1.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis,
                                                    officia.</p>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>

                                            </div>
                                        </a>
                                    </div>
                       
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_2.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi,
                                                    dolores.</p>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>

                                            </div>
                                        </a>
                                    </div>
                         
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_3.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure,
                                                    earum.</p>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>


                                            </div>
                                        </a>
                                    </div>
                          
                                </div>
                            </div>
                        </div>
       
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p><a href="#" class="btn btn-primary">View all news</a></p>
                            </div>
                        </div>
                    </div>
                    <div id="upcoming-events" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel" id="owl2">
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_3.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>
                                                <span class="probootstrap-location"><i class="icon-location2"></i>White
                                                    Palace, Brooklyn, NYC</span>
                                            </div>
                                        </a>
                                    </div>
                   
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_1.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>
                                                <span class="probootstrap-location"><i class="icon-location2"></i>White
                                                    Palace, Brooklyn, NYC</span>
                                            </div>
                                        </a>
                                    </div>
         
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_2.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>
                                                <span class="probootstrap-location"><i class="icon-location2"></i>White
                                                    Palace, Brooklyn, NYC</span>
                                            </div>
                                        </a>
                                    </div>
                 
                                    <div class="item">
                                        <a href="#" class="probootstrap-featured-news-box">
                                            <figure class="probootstrap-media"><img src="img/img_sm_3.jpg"
                                                    alt="Free Bootstrap Template by ProBootstrap.com"
                                                    class="img-responsive"></figure>
                                            <div class="probootstrap-text">
                                                <h3>Tempora consectetur unde nisi</h3>
                                                <span class="probootstrap-date"><i class="icon-calendar"></i>July 9,
                                                    2017</span>
                                                <span class="probootstrap-location"><i class="icon-location2"></i>White
                                                    Palace, Brooklyn, NYC</span>
                                            </div>
                                        </a>
                                    </div>
                     
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p><a href="#" class="btn btn-primary">View all events</a></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section> -->

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
                                    <h3> Tác giả: {{ $book -> book_author }}</h3>
                                    <p><a href="#" class="btn btn-primary">Đọc sách</a> <span class="enrolled-count"></span></p>
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



<!-- <section class="probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>Meet Our Qualified Teachers</h2>
                <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro
                    nesciunt</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="probootstrap-teacher text-center probootstrap-animate">
                    <figure class="media">
                        <img src="img/person_1.jpg" alt="Free Bootstrap Template by ProBootstrap.com"
                            class="img-responsive">
                    </figure>
                    <div class="text">
                        <h3>Chris Worth</h3>
                        <p>Physical Education</p>
                        <ul class="probootstrap-footer-social">
                            <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                            <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="probootstrap-teacher text-center probootstrap-animate">
                    <figure class="media">
                        <img src="img/person_5.jpg" alt="Free Bootstrap Template by ProBootstrap.com"
                            class="img-responsive">
                    </figure>
                    <div class="text">
                        <h3>Janet Morris</h3>
                        <p>English Teacher</p>
                        <ul class="probootstrap-footer-social">
                            <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                            <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-3 col-sm-6">
                <div class="probootstrap-teacher text-center probootstrap-animate">
                    <figure class="media">
                        <img src="img/person_6.jpg" alt="Free Bootstrap Template by ProBootstrap.com"
                            class="img-responsive">
                    </figure>
                    <div class="text">
                        <h3>Linda Reyez</h3>
                        <p>Math Teacher</p>
                        <ul class="probootstrap-footer-social">
                            <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                            <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="probootstrap-teacher text-center probootstrap-animate">
                    <figure class="media">
                        <img src="img/person_7.jpg" alt="Free Bootstrap Template by ProBootstrap.com"
                            class="img-responsive">
                    </figure>
                    <div class="text">
                        <h3>Jessa Sy</h3>
                        <p>Physics Teacher</p>
                        <ul class="probootstrap-footer-social">
                            <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                            <li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li class="instagram"><a href="#"><i class="icon-instagram2"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="icon-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial"
    style="background-image: url(img/slider_4.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>Alumni Testimonial</h2>
                <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro
                    nesciunt</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 probootstrap-animate">
                <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                    <div class="item">

                        <div class="probootstrap-testimony-wrap text-center">
                            <figure>
                                <img src="img/person_1.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                            </figure>
                            <blockquote class="quote">&ldquo;Design must be functional and functionality must be
                                translated into visual aesthetics, without any reliance on gimmicks that have to be
                                explained.&rdquo; <cite class="author"> &mdash; <span>Mike Fisher</span></cite>
                            </blockquote>
                        </div>

                    </div>
                    <div class="item">
                        <div class="probootstrap-testimony-wrap text-center">
                            <figure>
                                <img src="img/person_2.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                            </figure>
                            <blockquote class="quote">&ldquo;Creativity is just connecting things. When you ask creative
                                people how they did something, they feel a little guilty because they didn’t really do
                                it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite
                                    class="author"> &mdash;<span>Jorge Smith</span></cite></blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="probootstrap-testimony-wrap text-center">
                            <figure>
                                <img src="img/person_3.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                            </figure>
                            <blockquote class="quote">&ldquo;I think design would be better if designers were much more
                                skeptical about its applications. If you believe in the potency of your craft, where you
                                choose to dole it out is not something to take lightly.&rdquo; <cite
                                    class="author">&mdash; <span>Brandon White</span></cite></blockquote>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section> -->

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
                        <p>Là trường đại học đa ngành theo định hướng ứng dụng có uy tín trong và ngoài nước, từng bước khẳng định vị thế hàng đầu Việt Nam trong lĩnh vực năng lượng.</p>
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
                        <p>Trở thành trường đại học theo ứng dụng hàng đầu Việt Nam, theo mô hình tự chủ toàn diện, hội nhập với nền giáo dục tiên tiến khu vực và quốc tế. Người học được đào tạo toàn diện, đáp ứng tốt yêu cầu của thị trường lao động, có khả năng học tập suốt đời, có năng lực sáng tạo và khởi nghiệp. Kết quả nghiên cứu khoa học đáp ứng tốt yêu cầu thực tiễn, góp phần vào sự nghiệp công nghiệp hóa, hiện đại hóa đất nước.</p>
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
        <!-- END row -->
    </div>
</section>
@endsection