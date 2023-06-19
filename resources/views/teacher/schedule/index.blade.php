@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('teacher.schedule.create') }}" class="btn btn-md btn-success mb-3">
                            Tambah Jadwal
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jadwal</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Presensi</th>
                                    <th scope="col">Status Presensi</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $schedule->title }}</td>
                                        <td>{{ $schedule->grade->name }}</td>
                                        <td>{{ $schedule->day_schedule }}</td>
                                        <td>{{ $schedule->time_start }} - {{ $schedule->time_end }}</td>
                                        <td class="text-center" style="width: 15%">
                                            @if ($schedule->presence)
                                                <a href="" class="btn btn-sm btn-secondary"
                                                    style="pointer-events: none;">Buka</a>
                                                <a href={{ route('teacher.schedule.close', $schedule) }}
                                                    class="btn btn-sm btn-primary">Tutup</a>
                                            @else
                                                <a href={{ route('teacher.schedule.open', $schedule) }}
                                                    class="btn btn-sm btn-primary">Buka</a>
                                                <a href="" class="btn btn-sm btn-secondary"
                                                    style="pointer-events: none;">Tutup</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($schedule->presence)
                                                Buka
                                            @else
                                                Tutup
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 15%">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('teacher.schedule.destroy', $schedule) }}" method="POST">
                                                <a href="{{ route('teacher.schedule.edit', $schedule) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ $schedule->link }}" class="btn btn-sm btn-danger"
                                                target="_blank">Link</a>
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

@section('js')
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
