@extends('client.layout.main')

@section('title')
Tài khoản của bạn
@endsection

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
                <h1>Trang Tài Khoản</h1>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>


<div class="container" >


    <div class="main-body">

        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trang cá nhân</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tài khoản người dùng</li>
            </ol>
        </nav>
        @if(Auth::guard('member')->check())
                    @php
                        $user = Auth::guard('member')->user();
                    @endphp
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                            class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>{{ $user->name_login }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" >
                            <div class="card mb-3">
                                <div class="card-body" >
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tên đầy đủ</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->name_login }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->Email }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Số điện thoại</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->numberphone }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Địa chỉ</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->address }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Lịch sử đọc sách</h2>
                        <div class="body" >
                            <table id="datatable" class="cell-border table " style="width:100%, font-family:auto">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">STT</th>
                                        <th class="text-center" scope="col">ID sách</th>
                                        <th class="text-center" scope="col">Số lần đọc</th>
                                        <th class="text-center" scope="col">Ngày cập nhật cuối</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($reads as $read)
                                        <tr>
                                            <td class="text-center">{{ $count++ }}</td>
                                            <td class="text-center">{{ $read->book_id }}</td>
                                            <td class="text-center">{{ $read->read_count }}</td>
                                            <td class="text-center">{{ $read->last_read_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center text-center">
                            {{ $reads->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @else
            <p class="text-center mt-3 bg-danger">Bạn cần đăng nhập để xem thêm thông tin !. Vui lòng đăng nhập tại <a
                    href="{{ route('user_login') }}">đây</a>

        @endif
    @endsection