@extends('layouts.master')

@section('content')
    <body style="background: lightgray">

        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{route('tugas.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Tugas</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Nama Tugas">
                                </div>
                                <div class="form-group">
                                    <label for="category" class="form-label">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option hidden>Choose Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Keterangan Tugas">{{ old('content') }}</textarea>
                                
                                    <div class="form-group">
                                <label class="font-weight-bold">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">

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
        CKEDITOR.replace( 'content' );
        $(function() {
            $( "#datepicker" ).datepicker();
        })
    </script>
@endsection

