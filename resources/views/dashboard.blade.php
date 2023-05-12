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
                                <h5>Selamat Datang Admin</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    {{-- <table class="table small-font table-striped table-hover table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Google Chrome</td>
                                                <td>5120</td>
                                                <td><i class="fa fa-caret-up text-success"></i></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Mozilla Firefox</td>
                                                <td>4000</td>
                                                <td><i class="fa fa-caret-up text-success"></i></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Safari</td>
                                                <td>8800</td>
                                                <td><i class="fa fa-caret-down text-danger"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Opera Mini</td>
                                                <td>4123</td>
                                                <td><i class="fa fa-caret-up text-success"></i></td>
                                            </tr>
                                        </tbody>
                                    </table> --}}
                                </div>
                                <img class="img-fluid" src="../assets/images/gambar1.png" alt="Gambar Dashboard">
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')
    <script src="../vendor/chart.js/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/page/index.js"></script>
@endpush