@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('teacher.material.create') }}" class="btn btn-md btn-success mb-3">
                            Tambah Materi
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Materi</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">File </th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($materials as $material)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $material->title }}</td>
                                        <td>{{ $material->grade->name }}</td>
                                        <td>{{ $material->content }}</td>
                                        <td>
                                            @if ($material->file_url)
                                                <a href="{{ asset('/storage/posts/' . $material->file_url) }}"
                                                    class="btn btn-sm btn-primary">Open</a>
                                            @else
                                                <a href="" class="btn btn-sm btn-secondary"
                                                    style="pointer-events: none;">Open</a>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($material->video_url)
                                                <a href="{{ $material->video_url }}" class="btn btn-sm btn-primary">
                                                    Open
                                                </a>
                                            @else
                                                <a href="" class="btn btn-sm btn-secondary"
                                                    style="pointer-events: none;">Open
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 15%">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('teacher.material.destroy', $material) }}" method="POST">
                                                <a href="{{ route('teacher.material.edit', $material) }}"
                                                    class="btn btn-sm btn-primary">Edit
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
