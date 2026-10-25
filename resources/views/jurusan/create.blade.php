
@extends('adminlte::page')

@section('title', 'Tambah Jurusan')

@section('content_header')
    <h1>Tambah Jurusan</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Jurusan</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('jurusan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input
                    type="text"
                    name="nama_jurusan"
                    id="nama_jurusan"
                    class="form-control"
                    placeholder="Masukkan nama jurusan"
                    value="{{ old('nama_jurusan') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="kode_jurusan">Kode Jurusan</label>
                <input
                    type="text"
                    name="kode_jurusan"
                    id="kode_jurusan"
                    class="form-control"
                    placeholder="Masukkan kode jurusan"
                    value="{{ old('kode_jurusan') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea
                    name="keterangan"
                    id="keterangan"
                    class="form-control"
                    rows="3"
                    placeholder="Masukkan keterangan"
                >{{ old('keterangan') }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select
                    name="status"
                    id="status"
                    class="form-control"
                    required
                >
                    <option value="">-- Pilih Status --</option>

                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@stop
