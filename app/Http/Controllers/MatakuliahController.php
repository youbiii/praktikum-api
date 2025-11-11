<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah; // Panggil Model Matakuliah
use App\Models\Prodi;      // Panggil Model Prodi
use App\Models\Dosen;      // Panggil Model Dosen
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Menampilkan daftar semua matakuliah.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::with(['prodi', 'dosen'])->latest()->paginate(10);

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $dosens = Dosen::all();

        return view('matakuliah.create', compact('prodi', 'dosens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama_matakuliah' => 'required|string|max:255',
            'Semester'        => 'required|integer|min:1',
            'Jumlah_sks'      => 'required|integer|min:1|max:6',
            'prodi_id'        => 'required|exists:prodi,id',
            'dosen_id'        => 'nullable|exists:dosens,id',
        ]);

        Matakuliah::create($validatedData);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data matakuliah berhasil ditambahkan.');
    }

    public function show(Matakuliah $matakuliah)
    {

        $matakuliah->load(['prodi', 'dosen']);

        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {

        $prodi = Prodi::all();
        $dosens = Dosen::all();

        return view('matakuliah.edit', compact('matakuliah', 'prodi', 'dosens'));
    }


    public function update(Request $request, Matakuliah $matakuliah)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'Nama_matakuliah' => 'required|string|max:255',
            'Semester'        => 'required|integer|min:1',
            'Jumlah_sks'      => 'required|integer|min:1|max:6',
            'prodi_id'        => 'required|exists:prodi,id',
            'dosen_id'        => 'nullable|exists:dosens,id',
        ]);

        // 2. Update data di database
        $matakuliah->update($validatedData);

        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data matakuliah berhasil diperbarui.');
    }

    /**
     * Menghapus data matakuliah dari database.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data matakuliah berhasil dihapus.');
    }
}
