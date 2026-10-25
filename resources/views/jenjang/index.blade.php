
@extends('adminlte::page')

@section('title', 'Data Jenjang')

@section('content_header')
    <h1>Data Jenjang</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Jenjang</h3>

        <div class="card-tools">
            <a href="{{ route('jenjang.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Jenjang
            </a>
        </div>
    </div>

    <div class="card-body">

        {{-- Pesan berhasil --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form pencarian --}}
        <form action="{{ route('jenjang.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama jenjang..."
                    value="{{ request('search') }}"
                >

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>

                    <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                        Reset
                    </a>
                </div>
            </div>
        </form>

        {{-- Tabel data jenjang --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50">No</th>
                        <th>Nama Jenjang</th>
                        <th>Keterangan</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($jenjangs as $key => $jenjang)
                        <tr>
                            <td class="text-center">
                                {{ $jenjangs->firstItem() + $key }}
                            </td>

                            <td>{{ $jenjang->nama_jenjang }}</td>

                            <td>{{ $jenjang->keterangan ?? '-' }}</td>

                            <td class="text-center">

                                {{-- Tombol Detail --}}
                                <a
                                    href="{{ route('jenjang.show', $jenjang->id) }}"
                                    class="btn btn-info btn-sm"
                                    title="Detail"
                                >
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Tombol Edit --}}
                                <a
                                    href="{{ route('jenjang.edit', $jenjang->id) }}"
                                    class="btn btn-warning btn-sm"
                                    title="Edit"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form
                                    action="{{ route('jenjang.destroy', $jenjang->id) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Data jenjang belum tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-end">
            {{ $jenjangs->withQueryString()->links() }}
        </div>

    </div>
</div>

@stop
