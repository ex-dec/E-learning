@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="../vendor/chart.js/dist/Chart.min.css">
@endpush

@section('content')
    <div class="main-content">
        <div class="title">
            Dashboard
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header-statistics">
                            @auth
                                <h5>Selamat Datang {{ auth()->user()->name }}</h5>
                            @endauth
                        </div>
                        <div class="card-body">
                            <img class="img-fluid" src="/assets/images/gambar1.png" alt="Gambar Dashboard">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/assets/js/page/index.js"></script>
@endpush
