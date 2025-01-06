@extends('client.layout.main')

@section('title')
Kho sách
@endsection

@section('content')
@if(Auth::guard('member')->check())
    <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left section-heading probootstrap-animate">
                    <h1>Tài liệu chi tiết</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
            <div class="row">
                <!-- Sidebar chi tiết sách -->
                <div class="col-md-4 mb-4" id="probootstrap-sidebar">
                    <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate p-3">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tài liệu chi tiết</li>
                            </ol>
                        </nav>
                        <div class="image">
                            <div class="image-bg">
                                <img src="{{ asset($bookdetail->book_images) }}" class="img-fluid">
                            </div>
                        </div>
                        <p><strong>Tên sách:</strong> {{ $bookdetail->book_name }}</p>
                        <p><strong>Tác giả:</strong> {{ $bookdetail->book_author }}</p>
                        <p><strong>Nhà sản xuất:</strong> {{ $bookdetail->book_publisher }}</p>
                        <p><strong>Năm sản xuất:</strong> {{ $bookdetail->book_year_of_manufacture }}</p>
                        <p><strong>Số lượng:</strong> {{ $bookdetail->book_amount }}</p>
                        <p><strong>Danh mục:</strong> {{ $bookdetail->book_category }}</p>
                    </div>
                </div>

                <!-- Nội dung PDF -->
                <div class="col-md-7 col-md-push-1 probootstrap-animate" id="probootstrap-content">
                    <div class="text-center mt-3">
                        <canvas id="pdf-canvas"></canvas>
                        <div class="d-flex justify-content-center mb-3">
                            <div class="btn-group" role="group" aria-label="PDF navigation">
                                <button type="button" class="btn btn-primary" onclick="prevPage()">Trang trước</button>
                                <button type="button" class="btn btn-primary" onclick="nextPage()">Trang tiếp theo</button>
                            </div>
                        </div>
                        <p class="text-center mt-2">Trang <span id="page-num"></span> / <span id="page-count"></span></p>
                        <p style="margin-top:25px"><a href="{{ route('user_book') }}" class="btn btn-primary">Quay lại</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phần bình luận -->
        <div class="container mt-5">
            <h2>Để lại bình luận cho tài liệu này</h2>
           
            <form action="{{ route('user_comment', ['id' => $bookdetail->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $bookdetail->id }}">
                <input type="hidden" name="member_id" value="{{ Auth::guard('member')->user()->id }}">
                <div class="mb-3">
                    <textarea name="comment" id="comment">Welcome to TinyMCE!</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2 rounded-4">Gửi bình luận</button>
            </form>
        </div>
    </section>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/hbozepm8v83oquejurp97p1x4p1eymqxvifr4r4izmvfi34i/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = '//cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

        const url = '{{ route('showbook', ['book_file_name' => basename($bookdetail->book_file)]) }}';
        let pdfDoc = null, pageNum = 1, pageRendering = false, pageNumPending = null;
        const scale = 1.4;
        const canvas = document.getElementById('pdf-canvas');
        const ctx = canvas.getContext('2d');

        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then((page) => {
                const viewport = page.getViewport({ scale: scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = { canvasContext: ctx, viewport: viewport };
                const renderTask = page.render(renderContext);

                renderTask.promise.then(() => {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
            document.getElementById('page-num').textContent = num;
        }

        pdfjsLib.getDocument({ url: url, rangeChunkSize: 131072  }).promise.then((pdfDoc_) => {
            pdfDoc = pdfDoc_;
            document.getElementById('page-count').textContent = pdfDoc.numPages;
            renderPage(pageNum); // Render trang đầu tiên
        });

        function prevPage() {
            if (pageNum <= 1) return;
            pageNum--;
            renderPage(pageNum);
        }

        function nextPage() {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            renderPage(pageNum);
        }
    </script>
@else
    <p class="alert alert-danger text-center" role="alert" style="margin-top:25px">
        Bạn cần đăng nhập để xem thêm thông tin! Vui lòng đăng nhập tại <a href="{{ route('user_login') }}">đây</a>.
    </p>
@endif
@endsection
