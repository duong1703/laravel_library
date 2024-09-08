<div class="navbar-header bg-gray-100">
    <div class="btn-more js-btn-more visible-xs">
        <a href="#"><i class="icon-dots-three-vertical "></i></a>
    </div>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
        aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a style="margin-top:20px" href="/"><img src="{{ asset('img/CNTTIT.png') }}" width="210" height="75"></a>
</div>

<div id="navbar-collapse" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/">Trang chủ</a></li>
        <li><a href="{{ route('user_book') }}">Kho sách</a></li>
        <!-- <li><a href="teachers.html">Teachers</a></li>
        <li><a href="events.html">Events</a></li> -->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Giới thiệu</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('info_user') }}">Thông tin khái quát</a></li>
                <li><a href="{{ route('structure_user') }}">Cơ cấu tổ chức</a></li>
            </ul>
        </li>
        <li><a href="{{ route('user_contact') }}">Liên hệ</a></li>
        <!-- <li><a href="{{ route('user_login') }}" class="fa fa-user">Đăng nhập</a></li> -->
        @if(Auth::guard('member')->check())
                @php
                    $user = Auth::guard('member')->user();
                @endphp
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle fa fa-user">
                        Xin chào, {{ $user->name_login }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="text-center" href="{{ route('user_account') }}">Trang cá nhân</a></li>
                        <li>
                            <form action="{{ route('userLogoutpost') }}" method="post" class="text-center">
                                @csrf
                                <button type="submit" class="btn btn-primary">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </li>
        @else
            <li><a href="{{ route('user_login') }}" class="fa fa-user">Đăng nhập</a></li>
        @endif




    </ul>
</div>