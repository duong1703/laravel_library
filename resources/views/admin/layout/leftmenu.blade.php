<style>
    .leftmenu {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100%;
        background-color: #f8f9fa;
        overflow-y: auto;
        padding-top: 20px;
        z-index: 1000;
        /* Ensures menu stays on top */
    }
</style>
<div class="dash-nav dash-nav-dark leftmenu">
    <header>
        <a href="javascript::void()" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="{{ route('homeadmin') }}" class="easion-logo"><img src="{{ asset('img/CNTTIT.png') }}" width="210"
                height="75"></a>
    </header>
    <nav class="dash-nav-list">
        <a href="{{ route('homeadmin') }}" class="dash-nav-item" id="Thongke">
            <i class="fas fa-home"></i> Trang chủ </a>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-users"></i>Thành viên </a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('memberlist') }}" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="{{ route('memberadd') }}" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>
        @if (Auth::check() && Auth::user()->role === 'superadmin')
            <div class="dash-nav-dropdown">
                <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                    <i class="fas fa-users"></i>Quản trị viên</a>
                <div class="dash-nav-dropdown-menu">
                    <a href="{{ route('adminlist') }}" class="dash-nav-dropdown-item">Danh sách</a>
                    <a href="{{ route('adminadd') }}" class="dash-nav-dropdown-item">Thêm mới</a>
                </div>
            </div>
        @endif

        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fa fa-book"></i> Quản lý sách </a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('booklist') }}" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="{{ route('bookadd') }}" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-list"></i> Danh mục sách</a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('categorieslist') }}" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="{{ route('categoriesadd') }}" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fa fa-eye"></i> Lượt truy cập</a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('visitorslist') }}" class="dash-nav-dropdown-item">Xem lượt đọc</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fa fa-mail-bulk"></i>Tin nhắn hỗ trợ</a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('message_admin') }}" class="dash-nav-dropdown-item">Danh sách</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fa fa-info"></i>Thông tin hệ thống</a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('Infoversion') }}" class="dash-nav-dropdown-item">Phiên bản</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fa fa-lock"></i>Bảo mật xác thực</a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('auth2fa') }}" class="dash-nav-dropdown-item">Xác thực 2FA</a>
            </div>
        </div>
    </nav>
</div>