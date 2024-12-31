@extends('admin.main')

@section('title')
Theo dõi truy cập
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
        <h1 class="dash-title">Trang chủ / Xem lượt / Theo dõi truy cập</h1>
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
                        <div class="easion-card-title"> Theo dõi lượt truy cập </div>
                    </div>
                    <div class="card-body ">
                        <canvas id="readingChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/showReadingChart')
            .then(response => response.json())
            .then(data => {
                console.log(data);

                
                const bookNames = data.map(item => item.book_name);
                const readCounts = data.map(item => item.read_count);

              
                const ctx = document.getElementById('readingChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: bookNames, 
                        datasets: [{
                            label: 'Số lượt đọc sách',
                            data: readCounts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tên sách' 
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Số lượt đọc'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Lỗi khi lấy dữ liệu:', error);
            });
    });

</script>



@endsection