@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('jadwal.create') }}" class="btn btn-md btn-success mb-3">TAMBAH JADWAL</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Jadwal</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">PRESENSI</th>
                                <th scope="col">AKSI</th>
                                <th scope="col">Link</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($jadwal as $jadwal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jadwal->nama }}</td>
                                    <td>{{ $jadwal->kelas->name }}</td>
                                    <td>{!!$jadwal->hari_jadwal !!}</td>
                                    <td>
                                        <a href={{ route('buka', $jadwal->id) }} class="btn btn-sm btn-primary">Buka</a>
                                        </td>
                                        <a href={{ route('tutup', $jadwal->id) }} class="btn btn-sm btn-primary">Tutup</a>
                                        </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Jadwal belum Tersedia.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $jadwal->links() }} --}}
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
