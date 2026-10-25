<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenjang;
use Illuminate\Validation\Rule;

class JenjangController extends Controller
{
    /**
     * Menampilkan semua data jenjang.
     */
    public function index(Request $request)
    {
        $jenjangs = Jenjang::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jenjang', 'like', "%{$search}%")
                      ->orWhere('keterangan', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('jenjang.index', compact('jenjangs'));
    }

    /**
     * Menampilkan form tambah jenjang.
     */
    public function create()
    {
        return view('jenjang.create');
    }

    /**
     * Menyimpan data jenjang.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jenjang' => 'required|string|max:5|unique:jenjangs,nama_jenjang',
            'keterangan'   => 'nullable|string|max:255',
        ]);

        Jenjang::create($data);

        return redirect()->route('jenjang.index')
            ->with('success', 'Data jenjang berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit jenjang.
     */
    public function edit(Jenjang $jenjang)
    {
        return view('jenjang.edit', compact('jenjang'));
    }

    /**
     * Memperbarui data jenjang.
     */
    public function update(Request $request, Jenjang $jenjang)
    {
        $data = $request->validate([
            'nama_jenjang' => [
                'required',
                'string',
                'max:5',
                Rule::unique('jenjangs', 'nama_jenjang')->ignore($jenjang->id),
            ],
            'keterangan' => 'nullable|string|max:255',
        ]);

        $jenjang->update($data);

        return redirect()->route('jenjang.index')
            ->with('success', 'Data jenjang berhasil diperbarui.');
    }

    /**
     * Menampilkan detail jenjang.
     */
    public function show(Jenjang $jenjang)
    {
        return view('jenjang.show', compact('jenjang'));
    }

    /**
     * Menghapus data jenjang.
     */
    public function destroy(Jenjang $jenjang)
    {
        $jenjang->delete();

        return redirect()->route('jenjang.index')
            ->with('success', 'Data jenjang berhasil dihapus.');
    }
}
