<header class="dash-toolbar d-flex justify-content-between align-items-center">
   
    <div>
        <a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-bars"></i></a>
        <a href="javascript:void(0)" class="searchbox-toggle"><i class="fas fa-search"></i></a>
    </div>
    <form id="search_form">
        <div class="search_bar p-3">
            <div class="input-group">
                <input type="text" id="search_bar" class="form-control" placeholder="Tìm kiếm mục...">
                <span class="input-group-text">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
    </form>



    <div class="tools d-flex align-items-center">
    <div class="centered-icons" style="text-align: center;margin-top: 9px;color: #0d6efd;margin-left:10px">
        <a id="realtime-time"><i class="fa fa-clock-o"></i></a>
        <a id="realtime-date"><i class="fa fa-calendar-o"></i></a>
    </div>
        <!-- Icon chuông thông báo -->
        <div class="tools-item d-flex align-items-center me-3 position-relative">
            <a href="#" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell"></i>
            </a>
            <!-- Badge số lượng thông báo -->
            <span class="badge badge-danger position-absolute top-0 start-100 translate-middle"
                id="notificationCount">{{ $unansweredCount ?? 0 }}
            </span>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                <h6 class="dropdown-header">Thông báo</h6>
                <div id="notificationList" style="max-height: 200px; overflow-y: auto;">
                    @if ($unansweredCount > 0)
                        <a class="dropdown-item" href="{{ route('message_admin') }}">Có {{ $unansweredCount }} tin nhắn chưa
                            được trả lời.</a>
                    @else
                        <a class="dropdown-item">Không có tin nhắn mới.</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Icon người dùng -->
        <div class="dropdown tools-item">
            <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="javascript:void(0)">{{ auth()->user()->name }}</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>
</header>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.3.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.16.1/echo.iife.min.js"></script>

<script>
    // Khởi tạo Pusher và Laravel Echo
    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env('PUSHER_APP_KEY') }}',
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        forceTLS: true,
    });

    // Lắng nghe sự kiện 'ContactMessageSent' trên kênh 'admin-notifications'
    window.Echo.channel('admin-notifications')
        .listen('ContactMessageSent', (data) => {
            const notificationList = document.getElementById('notificationList');
            const notificationCount = document.getElementById('notificationCount');

            // Cập nhật số lượng tin nhắn chưa trả lời
            let currentCount = parseInt(notificationCount.textContent, 10) || 0;
            notificationCount.textContent = currentCount + 1;
            notificationCount.style.display = 'inline';  // Hiển thị số lượng thông báo
        });
</script>

<script>
    /* date */
    function updateDate() {
        var now = new Date();
        var options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var formattedDate = now.toLocaleDateString('en-US', options);

        document.getElementById('realtime-date').innerHTML = formattedDate;
    }

    // Gọi hàm updateDate() mỗi giây để cập nhật ngày
    setInterval(updateDate, 1000);

    /* date */
    function updateTime() {
        var now = new Date();
        var time = now.toLocaleTimeString();

        document.getElementById('realtime-time').innerHTML = time;
    }

    // Gọi hàm updateTime() mỗi giây để cập nhật thời gian
    setInterval(updateTime, 1000);
</script>