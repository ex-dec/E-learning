@extends('student.layouts.master')
@section('title', 'Schedule')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            @forelse ($schedules as $schedule)
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card bg-light mb-3">
                        <div
                            class="card-header bg-primary
                            @switch($loop->iteration % 4)
                            @case(0) bg-warning @break
                            @case(1) bg-primary @break
                            @case(2) bg-info @break
                            @case(3) bg-success @break
                            @endswitch
                            text-light font-weight-bold
                        ">
                            {{ ucfirst($schedule->day_schedule) }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i
                                    class="bi bi-file-text-fill text-dark"></i>{{ $schedule->title }}</h5>
                            <div class="row pb-3">
                                <div class="col-md-5 fas fa-video"style='font-size:14px text-dark'> Online</div>
                                <div class="col-md-7 fas fa-clock"style='font-size:14px text-dark'>
                                    {{ $schedule->time_start }} - {{ $schedule->time_end }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="alert alert-danger">
                        Kelas belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection
