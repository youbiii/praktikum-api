<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    // Menampilkan daftar semua jabatan (Index)
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan.index', compact('jabatans'));
    }

    // Menampilkan formulir pembuatan jabatan baru (Create)
    public function create()
    {
        return view('jabatan.create');
    }

    // Menyimpan data jabatan baru ke database (Store)
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|unique:jabatans|max:255',
            'kode_jabatan' => 'nullable|string|max:50',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil ditambahkan!');
    }

    // Menampilkan detail satu jabatan (Show)
    public function show(Jabatan $jabatan)
    {
        return view('jabatan.show', compact('jabatan'));
    }

    // Menampilkan formulir untuk mengedit data jabatan (Edit)
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    // Memperbarui data jabatan di database (Update)
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            // Pengecualian ID saat validasi unique
            'nama_jabatan' => 'required|string|max:255|unique:jabatans,nama_jabatan,' . $jabatan->id,
            'kode_jabatan' => 'nullable|string|max:50',
        ]);

        $jabatan->update($request->all());

        return redirect()->route('jabatans.index')
            ->with('success', 'Jabatan berhasil diperbarui!');
    }

    // Menghapus data jabatan dari database (Destroy)
    public function destroy(Jabatan $jabatan)
    {
        // Catatan: Karena 'jabatan_id' di tabel 'dosens' memiliki onDelete('set null'),
        // data dosen yang terkait tidak akan terhapus, hanya kolom 'jabatan_id' yang akan menjadi NULL.
        $jabatan->delete();

        return redirect()->route('jabatan.index')
            ->with('success', 'Jabatan berhasil dihapus!');
    }
}
