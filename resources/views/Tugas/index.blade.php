@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('tugas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH TUGAS</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Tugas</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Link</th>
                                <th scope="col">Tanggal Deadline</th>
                                <th scope="col">Waktu Deadline</th>
                                <th scope="col">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($tugas as $tugas)
                                <tr>
                                    <td>{{ $tugas->id }}</td>
                                    <td>{{ $tugas->nama }}</td>
                                    <td>{{ $tugas->kelas->name }}</td>
                                    <td>{!! $tugas->content !!}</td>
                                    <td>
                                        <a href={{ $tugas->tugas_url }} class="btn btn-sm btn-primary">Open</a>
                                       </td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tugas.destroy', $tugas->id) }}" method="POST">
                                            <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Tugas belum Tersedia.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $tugas->links() }} --}}
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
