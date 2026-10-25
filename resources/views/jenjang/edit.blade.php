
@extends('adminlte::page')

@section('title', 'Edit Jenjang')

@section('content_header')
    <h1>Edit Jenjang</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Edit Jenjang</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_jenjang">Nama Jenjang</label>

                <select
                    name="nama_jenjang"
                    id="nama_jenjang"
                    class="form-control"
                    required
                >
                    <option value="">-- Pilih Jenjang --</option>

                    <option value="X" {{ old('nama_jenjang', $jenjang->nama_jenjang) == 'X' ? 'selected' : '' }}>
                        X
                    </option>

                    <option value="XI" {{ old('nama_jenjang', $jenjang->nama_jenjang) == 'XI' ? 'selected' : '' }}>
                        XI
                    </option>

                    <option value="XII" {{ old('nama_jenjang', $jenjang->nama_jenjang) == 'XII' ? 'selected' : '' }}>
                        XII
                    </option>
                </select>

                @error('nama_jenjang')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>

                <textarea
                    name="keterangan"
                    id="keterangan"
                    class="form-control"
                    rows="3"
                    placeholder="Masukkan keterangan jenjang"
                >{{ old('keterangan', $jenjang->keterangan) }}</textarea>

                @error('keterangan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>

            <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

        </form>

    </div>
</div>

@stop
