<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    // ... (index() dan create() Anda sudah benar) ...
    public function index(Request $request)
    {
        // 1. Ambil data untuk dropdown filter
        $mahasiswas = Mahasiswa::orderBy('Nama_Mahasiswa', 'asc')->get();
        $dosens = Dosen::orderBy('Nama_Dosen', 'asc')->get();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Lulus'];

        // 2. Mulai query dasar
        $query = Krs::with(['mahasiswa', 'matakuliah', 'dosenPa']);

        // 3. Terapkan filter
        if ($request->filled('mahasiswa_id')) {
            $query->where('mahasiswa_id', $request->mahasiswa_id);
        }
        if ($request->filled('dosen_pa_id')) {
            $query->where('dosen_pa_id', $request->dosen_pa_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 4. Ambil data + pagination
        $krsEntries = $query->latest()
            ->paginate(10)
            ->appends(request()->query()); // Versi kompatibel

        // 5. Kirim semua data ke view
        return view('krs.index', compact(
            'krsEntries',
            'mahasiswas',
            'dosens',
            'statuses'
        ));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('krs.create', compact('mahasiswas', 'matakuliahs', 'dosens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id'      => 'required|exists:mahasiswas,id',
            'matakuliah_id'     => 'required|exists:matakuliah,id',
            'dosen_pa_id'       => 'nullable|exists:dosens,id',
            'tahun_akademik'    => 'required|string|max:10',
            'semester_diambil'  => 'required|string|max:10',
            'status'            => 'nullable|string|max:50',
            'nilai'             => 'nullable|string|max:5',
        ]);
        Krs::create($validatedData);
        return redirect()->route('krs.index')->with('success', 'Entri KRS berhasil ditambahkan.');
    }


    /**
     * DIUBAH: Ganti $krs menjadi $kr
     */
    public function show(Krs $kr)
    {
        $kr->load(['mahasiswa', 'matakuliah', 'dosenPa']);
        // DIUBAH: compact('kr')
        return view('krs.show', compact('kr'));
    }

    /**
     * DIUBAH: Ganti $krs menjadi $kr
     */
    public function edit(Krs $kr)
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();

        // DIUBAH: compact('kr')
        return view('krs.edit', compact('kr', 'mahasiswas', 'matakuliahs', 'dosens'));
    }

    /**
     * DIUBAH: Ganti $krs menjadi $kr
     */
    public function update(Request $request, Krs $kr)
    {
        $validatedData = $request->validate([
            'mahasiswa_id'      => 'required|exists:mahasiswas,id',
            'matakuliah_id'     => 'required|exists:matakuliah,id',
            'dosen_pa_id'       => 'nullable|exists:dosens,id',
            'tahun_akademik'    => 'required|string|max:10',
            'semester_diambil'  => 'required|string|max:10',
            'status'            => 'nullable|string|max:50',
            'nilai'             => 'nullable|string|max:5',
        ]);

        // DIUBAH: $kr->update()
        $kr->update($validatedData);

        return redirect()->route('krs.index')
            ->with('success', 'Entri KRS berhasil diperbarui.');
    }

    /**
     * DIUBAH: Ganti $krs menjadi $kr
     */
    public function destroy(Krs $kr)
    {
        // DIUBAH: $kr->delete()
        $kr->delete();

        return redirect()->route('krs.index')
            ->with('success', 'Entri KRS berhasil dihapus.');
    }
}
