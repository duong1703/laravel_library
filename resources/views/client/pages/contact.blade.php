@extends('client.layout.main')

@section('title')
Liên hệ
@endsection

@section('content')
@if(Auth::guard('member')->check())
    <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left section-heading probootstrap-animate">
                    <h1 class="mb0">Liên hệ với chúng tôi</h1>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </section>



    <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row probootstrap-gutter0">
                        <div class="col-md-4" id="probootstrap-sidebar">
                            <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                                    </ol>
                                </nav>
                                <h3>Địa chỉ</h3>
                                <ul class="probootstrap-side-menu">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6574509020284!2d105.78236867492957!3d21.04638798060741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1722160609757!5m2!1svi!2s"
                                        width="310" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                                </ul>
                            </div>
                        </div>


                        <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                            <p>Liên hệ với chúng tôi qua biểu mẫu dưới đây</p>
                            <form action="{{ route('postcontact') }}" method="post" class="probootstrap-form">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input value="{{ old('fullname') }}" type="text" class="form-control" id="fullname"
                                        name="fullname" required>
                                    @error('fullname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{ old('email') }}" type="email" class="form-control" id="email"
                                        name="email" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ID_student">Mã sinh viên</label>
                                    <input value="{{ old('ID_student') }}" type="text" class="form-control" id="ID_student"
                                        name="ID_student" required>
                                    @error('ID_student')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea cols="30" rows="10" class="form-control" id="message" name="message"
                                        required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit"
                                        value="Gửi tin nhắn">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert alert-danger text-center" role="alert" style="margin-top:25px">Bạn cần đăng nhập để nhận xét
        !. Vui lòng đăng nhập tại <a href="{{ route('user_login') }}">đây</a>

@endif
@endsection