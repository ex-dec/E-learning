@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('teacher.task.create') }}" class="btn btn-md btn-success mb-3">Tambah Tugas</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tugas</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Tanggal Deadline</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->nama }}</td>
                                        <td>{{ $task->kelas->name }}</td>
                                        <td>{{ $task->content }}</td>
                                        <td>
                                            <a href={{ $task->tugas_url }} class="btn btn-sm btn-primary">Open</a>
                                        </td>
                                        <td>{{ $task->deadline }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('task.destroy', $task->id) }}" method="POST">
                                                <a href="{{ route('task.edit', $task->id) }}"
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
        @if (session()->has('success'))

            toastr.success('{{ session('
                    success ') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('
                    error ') }}', 'GAGAL!');
        @endif
    </script>
@endsection
