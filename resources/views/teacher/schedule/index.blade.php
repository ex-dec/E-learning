@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('teacher.schedule.create') }}" class="btn btn-md btn-success mb-3">Tambah Jadwal</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jadwal</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Presensi</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $schedule->nama }}</td>
                                        <td>{{ $schedule->grade->name }}</td>
                                        <td>{{ $schedule->hari_jadwal }}</td>
                                        <td>{{ $schedule->tanggal_jadwal }}</td>
                                        <td>{{ $schedule->presensi_jadwal }}
                                            <a href={{ route('buka', $schedule->id) }} class="btn btn-sm btn-primary">Buka</a>
                                            <a href={{ route('tutup', $schedule->id) }}
                                                class="btn btn-sm btn-primary">Tutup</a>
                                        </td>
                                        <td>{{ $schedule->aksi_jadwal }}
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('teacher.schedule.destroy', $schedule->id) }}" method="POST">
                                                <a href="{{ route('teacher.schedule.edit', $schedule->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ $schedule->link}}" class="btn btn-sm btn-danger" target="_blank">Link</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Jadwal belum Tersedia.
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

{{-- @section('js')
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
@endsection --}}
