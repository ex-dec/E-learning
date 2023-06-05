@extends('layouts.master')

@section('content')

    <body style="background: lightgray">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('teacher.score.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="user" class="form-label">Siswa</label>
                                        <select class="form-control" name="user_id" id="user_id">
                                            <option hidden>Pilih Siswa</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-label">Kelas</label>
                                        <select class="form-control" name="grade_id" id="grade_id">
                                            <option hidden>Pilih Kelas</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-label">Tugas</label>
                                        <select class="form-control" name="task_id" id="task_id">
                                            <option hidden>Pilih Tugas</option>
                                            @foreach ($tasks as $task)
                                                <option value="{{ $task->id }}">{{ $task->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nilai</label>
                                    <input type="number" class="form-control @error('score') is-invalid @enderror"
                                        name="score" value="{{ old('score') }}" placeholder="Masukkan Nilai">
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection


@section('js')
    <script>
        CKEDITOR.replace('content');
        $(function() {
            $("#datepicker").datepicker();
        })
    </script>
@endsection
