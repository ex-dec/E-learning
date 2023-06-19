@extends('layouts.master')

@section('content')

    <body style="background: lightgray">

        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('admin.teacher.update', $teacher) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Guru</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $teacher->name }}" placeholder="Masukkan Nama Guru">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email Guru</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $teacher->email }}" placeholder="Masukkan Email Guru">
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

{{--
@section('js')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection --}}
