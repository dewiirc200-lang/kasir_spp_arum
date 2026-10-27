
@extends('adminlte::page')

@section('title', 'Data Kelas')

@section('content_header')
    <h1>Data Kelas</h1>
@stop

@section('content')
    <div class="card">
        {{-- Header --}}
        <div class="card-header">
            <h3 class="card-title">Daftar Kelas</h3>
            <div class="card-tools">
                <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kelas
                </a>
            </div>
        </div>

        {{-- Pencarian dan Alert --}}
        <div class="card-body pb-0">
            <form action="{{ route('kelas.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari nama kelas atau status"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Tabel Kelas --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Kelas</th>
                        <th>Jenjang</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kelass as $key => $kelas)
                    <tr>
                        <td>{{ $kelass->firstItem() + $key }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>{{ $kelas->jenjang->nama_jenjang ?? '-' }}</td>
                        <td>{{ $kelas->jurusan->nama_jurusan ?? '-' }}</td>
                        <td>
                            @if($kelas->status == 'aktif')
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            {{-- Tombol Lihat --}}
                            <a class="btn btn-info btn-sm"
                                href="{{ route('kelas.show', $kelas->id) }}"
                                title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>

                            {{-- Tombol Edit --}}
                            <a href="{{ route('kelas.edit', $kelas->id) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('kelas.destroy', $kelas->id) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Data kelas tidak ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="card-footer clearfix">
            {!! $kelass->appends(request()->query())->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@stop
