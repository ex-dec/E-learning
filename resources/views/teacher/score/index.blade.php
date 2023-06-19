@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('teacher.score.create') }}" class="btn btn-md btn-success mb-3">
                            Tambah Nilai
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tugas</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Tanggal Deadline</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($scores as $score)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $score->task->title }}</td>
                                        <td>{{ $score->user->name }}</td>
                                        <td>{{ $score->grade->name }}</td>
                                        <td>{{ $score->task->dateline }}</td>
                                        <td>{{ $score->score }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('teacher.score.destroy', $score) }}" method="POST">
                                                <a href="{{ route('teacher.score.edit', $score) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success ') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error ') }}', 'GAGAL!');
        @endif
    </script>
@endsection
