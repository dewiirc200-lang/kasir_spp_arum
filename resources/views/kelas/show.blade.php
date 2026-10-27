
@extends('adminlte::page')

@section('title', 'Detail Kelas')

@section('content_header')
    <h1>Detail Kelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Kelas</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">ID</th>
                    <td>{{ $kelas->id }}</td>
                </tr>

                <tr>
                    <th>Nama Kelas</th>
                    <td>{{ $kelas->nama_kelas }}</td>
                </tr>

                <tr>
                    <th>Jenjang</th>
                    <td>{{ $kelas->jenjang->nama_jenjang ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Jurusan</th>
                    <td>{{ $kelas->jurusan->nama_jurusan ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if($kelas->status == 'aktif')
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Nonaktif</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $kelas->created_at }}</td>
                </tr>

                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $kelas->updated_at }}</td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop
