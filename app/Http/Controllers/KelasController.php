<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jenjang;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        // Filter search
        $kelass = Kelas::query()
            ->with(['jenjang', 'jurusan'])
            ->when($request->search, function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('kelas.index', compact('kelass'));
    }

    public function create()
    {
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();

        return view('kelas.create', compact('jenjangs', 'jurusans'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $data = $request->validate([
           'nama_kelas' => 'required|string|max:20',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        // Simpan data
        Kelas::create($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();

        return view('kelas.edit', compact('kelas', 'jenjangs', 'jurusans'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        // Validasi data
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:20',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        // Update data
        $kelas->update($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function show(Kelas $kelas)
    {
        $kelas->load(['jenjang', 'jurusan']);

        return view('kelas.show', compact('kelas'));
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
