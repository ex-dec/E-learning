@extends('layouts.master')

@section('content')

    <body style="background: lightgray">

        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Tugas</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" value="{{ old('title') }}" placeholder="Masukkan Nama Tugas">
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-label">Kelas</label>
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option hidden>Choose Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                    <label class="font-weight-bold">Keterangan</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
                                        placeholder="Masukkan Keterangan Tugas">{{ old('content') }}</textarea>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Waktu Deadline</label>
                                        <input class="form-control @error('deadline') is-invalid @enderror" id="deadline"
                                            name="deadline" type="datetime-local">{{ old('deadline') }}



                                        <div class="form-group">
                                            <label class="font-weight-bold">Link Tugas</label>
                                            <input type="url"
                                                class="form-control @error('tugas_url') is-invalid @enderror" id="tugas_url"
                                                name="tugas_url" rows="5"
                                                placeholder="Masukkan Link">{{ old('content') }}</textarea>

                                            <!-- error message untuk content -->
                                            @error('content')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>

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
