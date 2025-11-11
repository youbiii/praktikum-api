@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-dark">Input Data Jabatan</h4>

        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data jabatan
        </a>

    </div>
    <div class="card-body">

        {{-- Form akan mengirim data ke Route 'jabatans.store' --}}
        <form action="{{ route('jabatan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_jabatan">Nama Jabatan <span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control @error('nama_jabatan') is-invalid @enderror"
                       id="nama_jabatan"
                       name="nama_jabatan"
                       value="{{ old('nama_jabatan') }}"
                       placeholder="Contoh: Ketua Program Studi">
                @error('nama_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode_jabatan">Kode Jabatan</label>
                <input type="text"
                       class="form-control @error('kode_jabatan') is-invalid @enderror"
                       id="kode_jabatan"
                       name="kode_jabatan"
                       value="{{ old('kode_jabatan') }}"
                       placeholder="Contoh: KAPRODI">
                @error('kode_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <button type="submit" class="btn btn-success btn-block">Simpan Jabatan</button>
        </form>

    </div>
</div>
@endsection
