<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use App\Models\Fakultas;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProdi = Prodi::getAllProdi();
        return view('prodi.index', compact('dataProdi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'kode_prodi' => 'required|string|max:10|unique:prodi,kode_prodi',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        // Simpan data ke database
        Prodi::create($validatedData);

        // Redirect ke halaman daftar prodi dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'kode_prodi' => 'required|string|max:10|unique:prodi,kode_prodi,' . $id,
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        // Update data di database
        Prodi::where('id', $id)->update($validatedData);

        // Redirect ke halaman daftar prodi dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus!');
    }
}
