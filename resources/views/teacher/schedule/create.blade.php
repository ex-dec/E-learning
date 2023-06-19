@extends('layouts.master')

@section('content')

    <body style="background: lightgray">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('teacher.schedule.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Jadwal</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" value="{{ old('title') }}" placeholder="Masukkan Nama Jadwal">
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-label">Kelas</label>
                                        <select class="form-control" name="grade_id" id="grade_id">
                                            <option hidden>Pilih Kelas</option>
                                            @foreach ($grades as $grade)
                                                <option value={{ $grade->id }}>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- error message untuk title -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Waktu Mulai</label>
                                    <input type="time" class="form-control @error('time_start') is-invalid @enderror"
                                        name="time_start" value="{{ old('time_start') }}"
                                        placeholder="Masukkan Waktu Mulai">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Waktu Selesai</label>
                                    <input type="time" class="form-control @error('time_end') is-invalid @enderror"
                                        name="time_end" value="{{ old('time_end') }}" placeholder="Masukkan Waktu Selesai">
                                </div>
                                <div class="form-group">
                                    <label for="category" class="form-label">Hari</label>
                                    <select class="form-control" id="day_schedule" name="day_schedule">
                                        <option hidden>Pilih Hari</option>
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                        <option value="sabtu">Sabtu</option>
                                        <option value="minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Link</label>
                                    <input type="url" class="form-control @error('link') is-invalid @enderror"
                                        name="link" value="{{ old('link') }}" placeholder="Masukkan Nama Jadwal">
                                    <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
    </script>
@endsection
