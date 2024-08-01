@extends('admin.main')

@section('title')
Trả lời tin nhắn
@endsection

@section('content')
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Tin nhắn hỗ trợ / Trả lời tin nhắn</h1>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="easion-card-title"> Trả lời tin nhắn </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('replyMessage', ['id' => $message->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="fullname">Họ tên</label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                    value="{{ $message->fullname }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $message->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="ID_student">Mã sinh viên</label>
                                <input type="text" class="form-control" id="ID_student" name="ID_student"
                                    value="{{ $message->ID_student }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message">Tin nhắn</label>
                                <textarea class="form-control" id="message" name="message" rows="3"
                                    readonly>{{ $message->message }}</textarea>
                            </div>
                            @if($message->status == 'chưa trả lời')
                            <div class="form-group">
                                <label for="reply">Phản hồi</label>
                                <textarea class="form-control" id="reply" name="reply" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection