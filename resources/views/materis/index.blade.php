@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('materis.create') }}" class="btn btn-md btn-success mb-3">TAMBAH MATERI</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Materi</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">File </th>
                                <th scope="col">LINK</th>
                                <th scope="col">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($materis as $materi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $materi->nama }}</td>
                                    <td>{{ $materi->kelas }}</td>
                                    <td>{{$materi->content}}</td>
                                    <td>
                                        <a href={{ asset('storage/posts/' . $materi->file_url) }} class="btn btn-sm btn-primary">Open</a>
                                    </td>
                                    <td>
                                        <a href={{ $materi->link_video}} class="btn btn-sm btn-primary">Open</a>
                                    </td>
                                    
                                   
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('materis.destroy', $materi->id) }}" method="POST">
                                            <a href="{{ route('materis.edit', $materi->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Materi belum Tersedia.
                                </div>
                            @endforelse
                            </tbody>
                        </table>  
                        {{ $materis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script> 
@endsection
