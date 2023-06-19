@extends('layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Persentase Nilai</th>
                                    <th scope="col">Persentase Kehadiran</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($studentObj as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student['name'] }}</td>
                                        <td>{{ $student['grade'] }}</td>
                                        <td>{{ $student['averageScore'] }}</td>
                                        <td>{{ $student['presencePercentage'] }}</td>
                                        <td>
                                            @if ($student['pass'])
                                                Lulus
                                            @else
                                                Tidak Lulus
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($student['pass'])
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('teacher.pass.store', $student['studentId']) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">Luluskan</button>
                                                </form>
                                            @else
                                                <button type="submit" class="btn btn-sm btn-secondary" style="pointer-events: none;">Luluskan</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data siswa belum ada
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
            toastr.success('{{ session(' success ') }}','BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session(' error ') }}', 'GAGAL!');
        @endif
    </script>
@endsection
