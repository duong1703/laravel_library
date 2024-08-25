@extends('client.layout.main')

@section('title')
Tài khoản của bạn
@endsection

@section('content')
<!-- <div class="container">
    <h1>Trang Tài Khoản</h1>

   
    <p>Xin chào, {{ Session::get('member_name_login') }}</p>

    <h2>Lịch sử đọc sách</h2>

</div> -->

<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
                <h1>Trang Tài Khoản</h1>
            </div>
        </div>
    </div>
</section>
<div class="container">

    <h4 class="mt-2">Xin chào, {{ Session::get('member_name_login') }}</h4>

    <h2>Lịch sử đọc sách</h2>

    @foreach($reads as $read)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $read->book->book_name }}</h5>
                <p class="card-text">Read on: {{ $read->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>
    @endforeach
</div>



@endsection