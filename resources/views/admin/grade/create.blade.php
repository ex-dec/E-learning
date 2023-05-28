@extends('layouts.master')

@section('content')

    <body style="background: lightgray">

        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('admin.grade.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Kelas</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Kelas">
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

{{--
@section('js')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection --}}
