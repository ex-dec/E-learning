@extends('student.layouts.course.master')
@section('content')
    <div class="container my-5">
        <div class="row">
            @forelse ($tasks as $task)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder text-dark">{{ $task->title }}</h5>
                            <p class="card-text text-dark">{{ $task->content }}</p>
                            <p class="card-text text-dark">Dateline : {{ $task->dateline }}</p>
                            <p class="card-text text-dark">
                                Score :
                                @foreach ($taskScore as $score)
                                    @if ($score->task_id == $task->id)
                                        {{ $score->score }}
                                    @endif
                                @endforeach
                            </p>

                            <div class="col-md-12 text-right" style="font-size: 15px">
                                <a href="{{ $task->task_url }}" class="btn btn-sm btn-primary" target="_blank">
                                    <div class="far fa-eye float-right"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="alert alert-danger">
                        Tidak ada tugas.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
