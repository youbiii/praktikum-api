<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\jabatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DosenExport;

class DosenController extends Controller
{
    public function index()
    {
        $jabatans = jabatan::all();
        $dosens = Dosen::with('jabatan')->get();
        return view('dosen.index', compact('dosens', 'jabatans'));
    }


    public function create()
    {
        $jabatans = jabatan::all();
        return view('dosen.create', compact('jabatans'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'Nama_Dosen' => 'required|string|max:255',
            'NIDN' => 'required|string|unique:dosens|max:20',
            'Email' => 'required|email|unique:dosens|max:255',
            'jabatan_id' => 'nullable|exists:jabatans,id',
            'Alamat' => 'nullable|string',
            'Gelar' => 'nullable|string|max:50',
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')
            ->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }


    public function edit(Dosen $dosen)
    {
        $jabatans = jabatan::all();
        return view('dosen.edit', compact('dosen', 'jabatans'));
    }


    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'Nama_Dosen' => 'required|string|max:255',
            // Pengecualian ID saat validasi unique
            'NIDN' => 'required|string|max:20|unique:dosens,NIDN,' . $dosen->id,
            'Email' => 'required|email|max:255|unique:dosens,Email,' . $dosen->id,
            'jabatan_id' => 'nullable|exists:jabatans,id',
            'No_HP' => 'nullable|string|max:15',
            'Alamat' => 'nullable|string',
            'Gelar' => 'nullable|string|max:50',
        ]);

        $dosen->update($request->all());

        return redirect()->route('dosen.index')
            ->with('success', 'Data Dosen berhasil diperbarui!');
    }

    // Menghapus data dosen dari database (Destroy)
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')
            ->with('success', 'Data Dosen berhasil dihapus!');
    }
     public function exportPDF(Dosen $dosen)
    {
        // 1. Pastikan data relasi (jabatan) sudah ter-load
        $dosen->load('jabatan');

        // 2. Load view template_pdf.blade.php dan kirim data $dosen
        $pdf = Pdf::loadView('dosen.template_pdf', compact('dosen'));

        // 3. Download file PDF dengan nama dinamis
        return $pdf->download('detail_dosen_' . $dosen->NIDN . '.pdf');
    }

    public function exportExcel(Dosen $dosen)
    {
        // 1. Panggil DosenExport class, kirim ID dosen
        // 2. Download file Excel dengan nama dinamis
        return Excel::download(new DosenExport($dosen->id), 'detail_dosen_' . $dosen->NIDN . '.xlsx');
    }
}
