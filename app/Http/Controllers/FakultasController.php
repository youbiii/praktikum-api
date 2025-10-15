<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas; // Pastikan Model Fakultas di-import

class FakultasController extends Controller
{
    public function index()
    {
        $dataFakultas = Fakultas::getAllFakultas();
        // Menggunakan compact() sudah benar untuk meneruskan data ke view
        return view('fakultas.index', compact('dataFakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_fakultas' => 'required|string|max:255',
            'kode_fakultas' => 'required|string|max:10|unique:fakultas,kode_fakultas',
        ]);

        // Simpan data ke database
        Fakultas::create($validatedData);

        // Redirect ke halaman daftar fakultas dengan pesan sukses
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('fakultas.edit', compact('fakultas'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_fakultas' => 'required|string|max:255',
            'kode_fakultas' => 'required|string|max:10|unique:fakultas,kode_fakultas,' . $id,
        ]);

        // Update data di database
        Fakultas::where('id', $id)->update($validatedData);

        // Redirect ke halaman daftar fakultas dengan pesan sukses
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui!');
    }
    public function show($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('fakultas.show', compact('fakultas'));
    }
    public function destroy($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus!');
    }
}
