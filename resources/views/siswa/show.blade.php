
@extends('adminlte::page')

@section('title', 'Detail Siswa')

@section('content_header')
    <h1>Detail Siswa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Siswa</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">ID</th>
                    <td>{{ $siswa->id }}</td>
                </tr>

                <tr>
                    <th>Nama Siswa</th>
                    <td>{{ $siswa->nama_siswa }}</td>
                </tr>

                <tr>
                    <th>NIS</th>
                    <td>{{ $siswa->nis }}</td>
                </tr>

                <tr>
                    <th>Jurusan</th>
                    <td>{{ $siswa->jurusan }}</td>
                </tr>

                <tr>
                    <th>Kelas</th>
                    <td>{{ $siswa->kelas }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $siswa->email ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $siswa->created_at }}</td>
                </tr>

                <tr>
                    <th>Diperbarui Pada</th>
                    <td>{{ $siswa->updated_at }}</td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop
