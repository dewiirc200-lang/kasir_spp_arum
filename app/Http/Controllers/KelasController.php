<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jenjang;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan data kelas dan fitur pencarian
    public function index(Request $request)
    {
        $kelass = Kelas::query()
            ->with(['jenjang', 'jurusan'])
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('kelas.index', compact('kelass'));
    }

    // Menampilkan halaman tambah kelas
    public function create()
    {
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();

        return view('kelas.create', compact('jenjangs', 'jurusans'));
    }

    // Menyimpan data kelas
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        Kelas::create($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    // Menampilkan halaman edit kelas
    public function edit(Kelas $kelas)
    {
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();

        return view('kelas.edit', compact('kelas', 'jenjangs', 'jurusans'));
    }

    // Memperbarui data kelas
    public function update(Request $request, Kelas $kelas)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        $kelas->update($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    // Menampilkan detail kelas
    public function show(Kelas $kelas)
    {
        $kelas->load(['jenjang', 'jurusan']);

        return view('kelas.show', compact('kelas'));
    }

    // Menghapus data kelas
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
