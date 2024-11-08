@extends('admin.main')

@section('title')
Thông tin phiên bản
@endsection


@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Thông tin phiên bản hệ thống</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Component</th>
                        <th>Phiên bản</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hệ điều hành</td>
                        <td><?php echo PHP_OS; ?></td>
                    </tr>
                    <tr>
                        <td>Phiên bản PHP</td>
                        <td><?php echo PHP_VERSION; ?></td>
                    </tr>
                    <tr>
                        <td>Phần mềm máy chủ</td>
                        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                    </tr>
                    <tr>
                        <td>Phiên bản Laravel</td>
                        <td>{{ Illuminate\Foundation\Application::VERSION }}</td>
                    </tr>
                    <tr>
                        <td>Phiên bản cơ sở dữ liệu</td>
                        <td>{{ DB::selectOne('select version() as version')->version }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-secondary" onclick="window.location.reload()">Refresh</button>
        </div>
    </div>


    @endsection