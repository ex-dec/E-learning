@extends('layouts.master')

@section('content')

    <body style="background: lightgray">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('teacher.schedule.update', $schedule) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Jadwal</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ $schedule->nama }}" placeholder="Masukkan Nama Jadwal">
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-label">Kelas</label>
                                        <select class="form-control" name="grade_id" id="grade">
                                            <option hidden value="{{ $gradeSelected->id }}">{{ $gradeSelected->name }}
                                            </option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jam</label>
                                    <input type="time" class="form-control @error('jam_jadwal') is-invalid @enderror"
                                        name="jam_jadwal" value="{{ $schedule->jam_jadwal }}"
                                        placeholder="Masukkan Nama Jadwal">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal_jadwal') is-invalid @enderror"
                                        name="tanggal_jadwal" value="{{ $schedule->tanggal_jadwal }}"
                                        placeholder="Masukkan Nama Jadwal">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Link</label>
                                    <input type="url" class="form-control @error('link') is-invalid @enderror"
                                        name="link" value="{{ $schedule->link }}" placeholder="Masukkan Nama Jadwal">
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">Update</button>
                                <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
{{-- @section('js')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection --}}