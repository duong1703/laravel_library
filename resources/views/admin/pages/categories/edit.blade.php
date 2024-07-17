@extends('admin.main')

@section('content')
<style>
    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    #name {
        pointer-events: none;
        /* Ngăn không cho chỉnh sửa */
        background-color: #e9ecef;
        /* Màu nền làm mờ */
    }
</style>
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Danh mục / Chỉnh sửa</h1>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                        <div class="easion-card-title"> Chỉnh sửa danh mục </div>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('categorieseditpost', ['id' => $categories->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{  $categories->name }}">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="subcategories">Danh mục con</label>
                                @foreach ($categories->subcategories as $subcategory)
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            name="subcategories[{{ $subcategory->id }}][name]"
                                            value="{{ old('subcategories.' . $subcategory->id . '.name', $subcategory->name) }}">
                                    </div>
                                @endforeach
                            </div>
                            @error('subcategories')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-success">Cập nhật</button>
                            <a href="{{ route('categorieslist') }}" class="btn btn-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection