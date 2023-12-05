@extends('student.layouts.master')
@section('title', 'Material')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            @if ($gradeId >= '1')
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title   font-weight-bolder text-dark">
                                <h5>Basic</h5>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('student.course.basic') }}" class="btn btn-primary">Akses Kelas</a>
                        </div>
                    </div>
                </div>
                @if ($gradeId >= '2')
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title   font-weight-bolder text-dark">
                                    <h5>Intermediate</h5>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('student.course.intermediate') }}" class="btn btn-primary">Akses Kelas</a>
                            </div>
                        </div>
                    </div>
                    @if ($gradeId >= '3')
                        <div class="col-md-4 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title   font-weight-bolder text-dark">
                                        <h5>Advance</h5>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('student.course.advance') }}" class="btn btn-primary">Akses Kelas</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
        </div>
    </div>
@endsection
