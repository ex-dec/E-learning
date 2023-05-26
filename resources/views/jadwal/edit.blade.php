{{-- @dd($jadwal) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Jadwal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Jadwal</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Nama Jadwal">
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

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>