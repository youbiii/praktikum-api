@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 font-weight-bold text-primary">Detail Kartu Rencana Studi (KRS)</h6>

            {{-- Tombol Kembali --}}
            <a href="{{ route('krs.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Daftar KRS
            </a>
        </div>
        <div class="card-body">

            {{-- Saya menggunakan Description List (dl, dt, dd) agar rapi --}}
            <dl class="row">

                {{-- Bagian Mahasiswa --}}
                <dt class="col-sm-3 text-dark font-weight-bold">Mahasiswa</dt>
                <dd class="col-sm-9">{{ $kr->mahasiswa?->Nama_Mahasiswa ?? 'Data Mahasiswa Hilang' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">NIM</dt>
                <dd class="col-sm-9">{{ $kr->mahasiswa?->NIM ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Prodi</dt>
                {{-- Asumsi relasi mahasiswa ke prodi sudah ada --}}
                <dd class="col-sm-9">{{ $kr->mahasiswa?->prodi?->nama_prodi ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Dosen PA</dt>
                <dd class="col-sm-9">{{ $kr->dosenPa?->Nama_Dosen ?? '— Belum Ditentukan —' }}</dd>

                {{-- Garis Pemisah --}}
                <hr class="col-12">

                {{-- Bagian Matakuliah --}}
                <dt class="col-sm-3 text-dark font-weight-bold">Matakuliah</dt>
                <dd class="col-sm-9">{{ $kr->matakuliah?->Nama_matakuliah ?? 'Data Matakuliah Hilang' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Kode Matakuliah</dt>
                {{-- Asumsi nama kolom adalah 'Kode_matakuliah' --}}
                <dd class="col-sm-9">{{ $kr->matakuliah?->Kode_matakuliah ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Jumlah SKS</dt>
                <dd class="col-sm-9">{{ $kr->matakuliah?->Jumlah_sks ?? '?' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Semester Matakuliah</dt>
                <dd class="col-sm-9">{{ $kr->matakuliah?->Semester ?? '?' }}</dd>

                {{-- Garis Pemisah --}}
                <hr class="col-12">

                {{-- Bagian Detail KRS --}}
                <dt class="col-sm-3 text-dark font-weight-bold">Semester Diambil</dt>
                <dd class="col-sm-9">{{ $kr->semester_diambil ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Tahun Akademik</dt>
                <dd class="col-sm-9">{{ $kr->tahun_akademik ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Status</dt>
                <dd class="col-sm-9">
                    @if ($kr->status == 'Approved' || $kr->status == 'Lulus')
                        <span class="badge badge-success">{{ $kr->status }}</span>
                    @elseif ($kr->status == 'Pending')
                        <span class="badge badge-warning">{{ $kr->status }}</span>
                    @elseif ($kr->status == 'Rejected')
                        <span class="badge badge-danger">{{ $kr->status }}</span>
                    @else
                        <span class="badge badge-secondary">{{ $kr->status ?? 'N/A' }}</span>
                    @endif
                </dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Nilai</dt>
                <dd class="col-sm-9">
                    <h5 class="font-weight-bold mb-0">{{ $kr->nilai ?? '— Belum Ada Nilai —' }}</h5>
                </dd>

                {{-- Garis Pemisah --}}
                <hr class="col-12">

                <dt class="col-sm-3 text-dark font-weight-bold">Dibuat Pada</dt>
                <dd class="col-sm-9">{{ $kr->created_at ? $kr->created_at->format('d M Y, H:i:s') : 'N/A' }}</dd>

                <dt class="col-sm-3 text-dark font-weight-bold">Diperbarui Pada</dt>
                <dd class="col-sm-9">{{ $kr->updated_at ? $kr->updated_at->format('d M Y, H:i:s') : 'N/A' }}</dd>

            </dl>

            <hr>

            {{-- Tombol Aksi (Edit & Delete) --}}
            <div class="d-flex justify-content-end">
                {{-- Tombol Edit KRS --}}
                <a href="{{ route('krs.edit', $kr->id) }}" class="btn btn-warning shadow-sm m-1">
                    <i class="fas fa-pen fa-sm text-white-50"></i> Edit
                </a>

                {{-- Form Delete KRS --}}
                <form action="{{ route('krs.destroy', $kr->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger shadow-sm m-1"
                        onclick="return confirm('Yakin ingin menghapus entri KRS ini?')">
                        <i class="fas fa-trash fa-sm text-white-50"></i> Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection
