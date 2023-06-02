@extends('student.layouts.course.master')
@section('content')
    <div class="container my-5">
        <div class="row">
            @forelse ($materials as $material)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder text-dark">{{ $material->title}}</h5>
                            <p class="card-text text-dark">{{ $material->content}}</p>
                            <div class="col-md-12" style="font-size: 15px">
                                <div class="fa fa-download float-right"></div>
                                <div class="col-md-11" style="font-size: 15px">
                                    <div class="far fa-eye float-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="alert alert-danger">
                        Materi belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
