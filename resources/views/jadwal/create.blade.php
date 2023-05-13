@extends('layouts.master')

@section('content')
    <body style="background: lightgray">

        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{route('jadwal.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Jadwal</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Jadwal">
                                </div>
                                <div class="form-group">
                                    <label for="category" class="form-label">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option hidden>Choose Kelas</option>
                                             @foreach ($kelas as $item)
                                                <option value="{{ $item->id }}">{{ $item->id }}</option>
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
                                 <label class="font-weight-bold">Jam</label>
                                 <input type="time" class="form-control @error('jam_jadwal') is-invalid @enderror" name="jam_jadwal" value="{{ old('jam_jadwal') }}" placeholder="Masukkan Nama Jadwal">
                                </div>     
                                  <div class="form-group">
                                     <label class="font-weight-bold">Tanggal</label>
                                     <input type="date" class="form-control @error('tanggal_jadwal') is-invalid @enderror" name="tanggal_jadwal" value="{{ old('tanggal_jadwal') }}" placeholder="Masukkan Nama Jadwal">
                                  </div>
                                     <div class="form-group">
                                      <label class="font-weight-bold">Link</label>
                                       <input type="url" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" placeholder="Masukkan Nama Jadwal">
                                  
                                       <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
    </script>
@endsection

