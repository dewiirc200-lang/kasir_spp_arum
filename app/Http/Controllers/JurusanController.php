<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\Validation\Rule;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jurusans = Jurusan::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jurusan', 'like', "%{$search}%")
                      ->orWhere('kode_jurusan', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:20|unique:jurusan,kode_jurusan',
            'keterangan'   => 'nullable|string',
            'status'       => 'required|string|max:20',
        ]);

        Jurusan::create($data);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => [
                'required',
                'string',
                'max:20',
                Rule::unique('jurusan', 'kode_jurusan')->ignore($jurusan->id),
            ],
            'keterangan' => 'nullable|string',
            'status'     => 'required|string|max:20',
        ]);

        $jurusan->update($data);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
