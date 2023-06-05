@extends('student.layouts.course.master')
@section('content')
    <div class="container my-5">
        <h3 class="font-weight-bolder text-dark">Intermediate</h3>
        <div class="row">
            @forelse ($materials as $material)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder text-dark">{{ $material->title }}</h5>
                            <p class="card-text text-dark">{{ $material->content }}</p>
                            <div class="col-md-12 text-right" style="font-size: 15px">
                                <div class="card-text text-dark text-right">
                                    <a href="{{ $material->video_url }}" class="btn btn-primary" target="_blank">
                                        <i class="fas fa-play"></i> Putar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="alert alert-danger">
                        Video belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
