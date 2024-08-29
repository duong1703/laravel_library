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
    <div class="body">
        <table id="datatable" class="cell-border table " style="width:100%">
            <thead>
                <tr>
                    <th class="text-center" scope="col">STT</th>
                    <th class="text-center" scope="col">Tên sách</th>
                    <th class="text-center" scope="col">Ngày đọc</th>
                    <th class="text-center" scope="col">Ngày cập nhật cuối</th>
                </tr>
            </thead>
        </table>
    </div>

</div>



@endsection