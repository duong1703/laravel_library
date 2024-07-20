@extends('admin.main')

@section('title')
Danh sách danh mục
@endsection

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
        <h1 class="dash-title">Trang chủ / Danh mục / Danh Sách</h1>
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
                        <div class="easion-card-title"> Danh sách danh mục </div>
                    </div>
                    <div class="card-body ">
                        <table id="datatable" class="cell-border">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Tên danh mục cha</th>
                                    <th scope="col">Tên danh mục con</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach($categories as $category)
                                    @foreach($category->subcategories as $subcategory)

                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $subcategory->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('categoriesedit', ['id' => $category->id]) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('categoriesdelete', ['id' => $subcategory->id]) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection