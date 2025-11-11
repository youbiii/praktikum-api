<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MahasiswaExport;

class MahasiswaController extends Controller
{

    public function index()
    {

        $mahasiswa = Mahasiswa::with('prodi', 'dosenPA')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('prodi', 'dosens'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'Nama_Mahasiswa' => 'required|string|max:255',
            'NIM' => 'required|string|unique:mahasiswas|max:20',
            'Email' => 'required|email|unique:mahasiswas|max:255',
            'prodi_id' => 'required|exists:prodi,id',
            'dosen_pa_id' => 'nullable|exists:dosens,id',
            'Jenis_Kelamin' => 'nullable|string',
            'No_HP' => 'nullable|string|max:15',
            'Alamat' => 'nullable|string',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }


    public function show(Mahasiswa $mahasiswa)
    {

        $mahasiswa->load('prodi', 'dosenPA');
        return view('mahasiswa.show', compact('mahasiswa'));
    }


    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        $dosens = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi', 'dosens'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'Nama_Mahasiswa' => 'required|string|max:255',
            'NIM' => 'required|string|max:20|unique:mahasiswas,NIM,' . $mahasiswa->id,
            'Email' => 'required|email|max:255|unique:mahasiswas,Email,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'dosen_pa_id' => 'nullable|exists:dosens,id',
            'Jenis_Kelamin' => 'nullable|string',
            'No_HP' => 'nullable|string|max:15',
            'Alamat' => 'nullable|string',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil dihapus!');
    }

    public function exportPDF(Mahasiswa $mahasiswa)
    {
        // --- PERUBAHAN DIMULAI ---
        // Mengganti placeholder dengan logika DOMPDF

        // 1. Pastikan data relasi (prodi, dosenPA) sudah ter-load
        $mahasiswa->load('prodi', 'dosenPA');

        // 2. Load view template_pdf.blade.php dan kirim data $mahasiswa
        $pdf = Pdf::loadView('mahasiswa.template_pdf', compact('mahasiswa'));

        // 3. Download file PDF dengan nama dinamis
        return $pdf->download('detail_mahasiswa_' . $mahasiswa->NIM . '.pdf');
        // --- PERUBAHAN SELESAI ---
    }

    /**
     * Menghasilkan file Excel untuk satu mahasiswa.
     *
     * @param \App\Models\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function exportExcel(Mahasiswa $mahasiswa)
    {
        // --- PERUBAHAN DIMULAI ---
        // Mengganti placeholder dengan logika Maatwebsite/Excel

        // 1. Panggil class MahasiswaExport yang baru kita buat
        // 2. Kirim $mahasiswa->id ke constructor-nya
        // 3. Download file Excel dengan nama dinamis
        return Excel::download(new MahasiswaExport($mahasiswa->id), 'detail_mahasiswa_' . $mahasiswa->NIM . '.xlsx');
        // --- PERUBAHAN SELESAI ---
    }
}

