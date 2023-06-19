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
                                    <th scope="col">Tanggal Presensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($presences as $presence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $presence->user->name }}</td>
                                        <td>{{ $presence->schedule->grade->name }}</td>
                                        <td>{{ $presence->created_at }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Presensi belum Tersedia.
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
            toastr.success('{{ session('success ') }}','BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error ') }}','GAGAL!');
        @endif
    </script>
@endsection
