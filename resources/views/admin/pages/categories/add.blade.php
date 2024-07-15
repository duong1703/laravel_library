@extends('admin.main')

@section('content')
<style>
.action-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
</style>
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Danh mục / Thêm mới</h1>
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
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thêm mới danh mục </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('categoriespost') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="categories_name" class="form-label">Tên danh mục cha</label>
                                <input type="text" class="form-control" id="categories_name" name="categories_name" placeholder="Tên danh mục cha" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcategories_name" class="form-label">Tên danh mục con</label>
                                <input type="text" class="form-control" id="subcategories_name" name="subcategories_name" placeholder="Tên danh mục con" required>
                            </div>
                           
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                            <a href="{{ route('categorieslist') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection