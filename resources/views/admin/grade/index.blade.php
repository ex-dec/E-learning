@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('admin.grade.create') }}" class="btn btn-md btn-success mb-3">Tambah Kelas</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="width:5%">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col" style="width:20%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($grades as $grade)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.grade.destroy', $grade) }}" method="POST">
                                            <a href="{{ route('admin.grade.edit', $grade) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Belum ada kelas.
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
