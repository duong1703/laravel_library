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
        <a href="{{ route('homeadmin') }}" class="dash-nav-item">
            <i class="fas fa-home"></i> Thống kê </a>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-users"></i>Thành viên </a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('memberlist') }}" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="{{ route('memberadd') }}" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>
        <div class="dash-nav-dropdown">
            <a href="javascript::void(0)" class="dash-nav-item dash-nav-dropdown-toggle">
                <i class="fas fa-users"></i>Quản trị viên</a>
            <div class="dash-nav-dropdown-menu">
                <a href="{{ route('adminlist') }}" class="dash-nav-dropdown-item">Danh sách</a>
                <a href="{{ route('adminadd') }}" class="dash-nav-dropdown-item">Thêm mới</a>
            </div>
        </div>
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
        <a href="contacts.html" class="dash-nav-item">
            <i class="fas fa-info"></i>Liên hệ
        </a>
    </nav>
</div>