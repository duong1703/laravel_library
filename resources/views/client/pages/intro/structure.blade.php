@extends('client.layout.main')

@section('title')
Cơ cấu tổ chức
@endsection

@section('content')
<style>
    .section-intro {
        padding: 60px 0;
        background-color: #f8f9fa;
    }
</style>
<section class="section-intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img src="{{ asset('img/sodo.jpg') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

@endsection