@extends('admin.main')

@section('title')
    Trang chủ
@endsection

@section('content')

<div class="container-fluid">
<p class="fw-bold fs-3">THỐNG KÊ</p>
    <div class="row dash-row">
        
        <div class="col-xl-3">
            <div class="stats stats-primary rounded-4">
                <h3 class="stats-title">Tổng thành viên </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number"> {{ $membercount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="stats stats-success  rounded-4">
                <h3 class="stats-title"> Tổng số sách</h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number"> {{ $bookcount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="stats stats-warning  rounded-4">
                <h3 class="stats-title"> Tổng danh mục cha </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number">{{ $categoriescount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="stats stats-info  rounded-4">
                <h3 class="stats-title"> Tổng danh mục con </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number">{{ $subcategoriescount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="stats stats-light  rounded-4">
                <h3 class="stats-title"> Tổng quản trị </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number">{{ $admincount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection