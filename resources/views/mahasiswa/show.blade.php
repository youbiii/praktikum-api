@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        {{-- CARD HEADER --}}
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Detail Mahasiswa</h4>

            <div>
                {{-- Tombol Edit --}}
                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm shadow-sm">
                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit Data
                </a>

                {{-- Tombol Kembali --}}
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
                </a>
            </div>
        </div>

        {{-- CARD BODY --}}
        <div class="card-body">
            <div class="row">
                {{-- Kolom Kiri: Identitas Utama --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">NIM</label>
                        <p class="form-control-static">{{ $mahasiswa->NIM }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Nama Mahasiswa</label>
                        <p class="form-control-static">{{ $mahasiswa->Nama_Mahasiswa }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Email</label>
                        <p class="form-control-static">{{ $mahasiswa->Email }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        {{-- Gunakan null coalescing operator (??) untuk menangani data kosong/NULL --}}
                        <p class="form-control-static">{{ $mahasiswa->Jenis_Kelamin ?? '— Tidak Ada —' }}</p>
                    </div>
                </div>

                {{-- Kolom Kanan: Relasi & Kontak --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Program Studi</label>
                        {{--
                      Gunakan optional helper (?->) untuk mengakses relasi dengan aman.
                      Jika $mahasiswa->prodi adalah null, ini tidak akan error.
                    --}}
                        <p class="form-control-static">{{ $mahasiswa->prodi?->nama_prodi ?? '— Tidak Ada —' }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Dosen Pembimbing Akademik (PA)</label>
                        <p class="form-control-static">{{ $mahasiswa->dosenPA?->Nama_Dosen ?? '— Tidak Ada —' }}</p>
                        @if ($mahasiswa->dosenPA)
                            <small class="text-muted">NIDN: {{ $mahasiswa->dosenPA->NIDN }}</small>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Nomor HP</label>
                        <p class="form-control-static">{{ $mahasiswa->No_HP ?? '— Tidak Ada —' }}</p>
                    </div>
                </div>
            </div>

            <hr>

            {{-- Bagian Alamat (Lebar Penuh) --}}
            <div class="form-group mb-3">
                <label class="font-weight-bold">Alamat Lengkap</label>
                <p class="form-control-static" style="white-space: pre-wrap;">{{ $mahasiswa->Alamat ?? '— Tidak Ada —' }}
                </p>
            </div>

            <hr> {{-- Pemisah baru untuk tombol download --}}

            {{-- Bagian Tombol Download --}}
            <div class="row">
                <div class="col-md-12 text-right"> {{-- Menggunakan text-right untuk meletakkan ke kanan --}}

                    {{-- Tombol Download PDF --}}
                    <a href="{{ route('mahasiswa.export.pdf', $mahasiswa->id) }}" class="btn btn-danger shadow-sm">
                        <i class="fas fa-file-pdf fa-sm text-white-50"></i> Download PDF
                    </a>

                    {{-- Tombol Download Excel --}}
                    <a href="{{ route('mahasiswa.export.excel', $mahasiswa->id) }}" class="btn btn-success shadow-sm ml-2">
                        <i class="fas fa-file-excel fa-sm text-white-50"></i> Download Excel
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
