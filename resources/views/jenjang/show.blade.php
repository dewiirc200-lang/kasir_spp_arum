
@extends('adminlte::page')

@section('title', 'Detail Jenjang')

@section('content_header')
    <h1>Detail Jenjang</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Informasi Jenjang</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th width="200">Nama Jenjang</th>
                <td>{{ $jenjang->nama_jenjang }}</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td>{{ $jenjang->keterangan ?? '-' }}</td>
            </tr>
        </table>

        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('jenjang.edit', $jenjang->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>

    </div>
</div>

@stop
