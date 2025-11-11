@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        {{-- CARD HEADER --}}
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Edit Data Mahasiswa: {{ $jabatan->nama_jabatan }}</h4>
            <a href="{{ route('jabatan.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data Mahasiswa
            </a>
        </div>
        <div class="card-body">
            {{-- Form diarahkan ke Route 'jabatans.update' dengan ID jabatan --}}
            <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- PENTING: Untuk menggunakan HTTP method PUT/PATCH --}}

                <div class="form-group">
                    <label for="nama_jabatan">Nama Jabatan <span class="text-danger">*</span></label>
                    {{-- Nilai default diisi dari data $jabatan --}}
                    <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan"
                        name="nama_jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}"
                        placeholder="Contoh: Ketua Program Studi">
                    @error('nama_jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kode_jabatan">Kode Jabatan</label>
                    <input type="text" class="form-control @error('kode_jabatan') is-invalid @enderror" id="kode_jabatan"
                        name="kode_jabatan" value="{{ old('kode_jabatan', $jabatan->kode_jabatan) }}"
                        placeholder="Contoh: KAPRODI">
                    @error('kode_jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <button type="submit" class="btn btn-success btn-block">Perbarui Jabatan</button>
            </form>

        </div>
    </div>
@endsection
