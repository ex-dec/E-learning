@extends('layouts.master')
@section('content')

    <body style="background: lightgray">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('teacher.material.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Materi</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Materi">
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-label">Kelas</label>
                                        <select class="form-control" name="grade_id" id="grade_id">
                                            <option hidden>Choose Kelas</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Keterangan</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                        placeholder="Masukkan Keterangan Materi">{{ old('content') }}</textarea>
                                    <div class="form-group">
                                        <label class="font-weight-bold">File</label>
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                            name="file">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Link Video</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="video_url" value="{{ old('video_url') }}"
                                                placeholder="Masukkan Link Video">
                                        </div>
                                        @error('content')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
