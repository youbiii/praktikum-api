@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        {{-- CARD HEADER --}}
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Detail Mahasiswa</h4>

            <div>
                {{-- Tombol Edit --}}
                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm shadow-sm">
                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit Data
                </a>

                {{-- Tombol Kembali --}}
                <a href="{{ route('dosen.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body">

            {{-- Menggunakan template 2 kolom (row) seperti mahasiswa.show --}}
            <div class="row">
                {{-- Kolom Kiri --}}
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Dosen</dt>
                        <dd class="col-sm-8">{{ $dosen->Nama_Dosen }}</dd>

                        <dt class="col-sm-4">NIDN</dt>
                        <dd class="col-sm-8">{{ $dosen->NIDN }}</dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $dosen->Email }}</dd>
                    </dl>
                </div>

                {{-- Kolom Kanan --}}
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-4">Jabatan</dt>
                        {{--
                          PERBAIKAN PENTING:
                          Menggunakan Nullsafe Operator (->?)
                          Jika $dosen->jabatan = null, kode ini tidak akan error.
                        --}}
                        <dd class="col-sm-8">{{ $dosen->jabatan?->nama_jabatan ?? '— Belum Ditentukan —' }}</dd>

                        <dt class="col-sm-4">Gelar</dt>
                        <dd class="col-sm-8">{{ $dosen->Gelar ?? '— Tidak Ada —' }}</dd>

                        <dt class="col-sm-4">Nomor HP</dt>
                        <dd class="col-sm-8">{{ $dosen->No_HP ?? '— Tidak Ada —' }}</dd>
                    </dl>
                </div>
            </div>

            {{-- Alamat (Full Width) --}}
            <dl class="row">
                <dt class="col-sm-2">Alamat</dt>
                <dd class="col-sm-10">{{ $dosen->Alamat ?? '— Tidak Ada —' }}</dd>
            </dl>

            {{-- Info Timestamps (Full Width) --}}
            <dl class="row">
                <dt class="col-sm-2">Dibuat Pada</dt>
                <dd class="col-sm-10">{{ $dosen->created_at }}</dd>

                <dt class="col-sm-2">Diperbarui Pada</dt>
                <dd class="col-sm-10">{{ $dosen->updated_at }}</dd>
            </dl>


            <hr>

            {{-- Tombol Aksi (Edit, Hapus, Download) --}}
            <div class="mt-4 d-flex justify-content-end"> {{-- Mengelompokkan tombol di kanan --}}

                {{-- Tombol Dropdown Download (dari kode Anda) --}}
                <div class="row">
                    <div class="col-md-12 text-right"> {{-- Menggunakan text-right untuk meletakkan ke kanan --}}

                        {{-- Tombol Download PDF --}}
                        <a href="{{ route('dosen.export.pdf', $dosen->id) }}" class="btn btn-danger shadow-sm">
                            <i class="fas fa-file-pdf fa-sm text-white-50"></i> Download PDF
                        </a>

                        {{-- Tombol Download Excel --}}
                        <a href="{{ route('dosen.export.excel', $dosen->id) }}"
                            class="btn btn-success shadow-sm ml-2">
                            <i class="fas fa-file-excel fa-sm text-white-50"></i> Download Excel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
