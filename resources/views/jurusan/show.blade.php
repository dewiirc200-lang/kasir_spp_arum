
@extends('adminlte::page')

@section('title', 'Detail Jurusan')

@section('content_header')
    <h1>Detail Jurusan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Informasi Jurusan</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th width="200">Nama Jurusan</th>
                <td>{{ $jurusan->nama_jurusan }}</td>
            </tr>

            <tr>
                <th>Kode Jurusan</th>
                <td>{{ $jurusan->kode_jurusan }}</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td>{{ $jurusan->keterangan }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $jurusan->status }}</td>
            </tr>
        </table>

        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
            Kembali
        </a>

        <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-warning">
            Edit
        </a>

    </div>
</div>

@stop
