@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Fakultas</h1>
        <p class="mb-0">Masukkan detail fakultas baru.</p>
    </div>
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Data Fakultas
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Fakultas Baru</h6>
    </div>
    <div class="card-body">

        {{-- Form akan mengirim data ke Route 'fakultas.store' --}}
        {{-- Gunakan method POST --}}
        <form action="{{ route('fakultas.store') }}" method="POST">
            @csrf {{-- Token keamanan Laravel wajib ada untuk semua form POST --}}

            <div class="form-group">
                <label for="nama_fakultas">Nama Fakultas <span class="text-danger">*</span></label>
                {{-- Input field dengan value old() untuk menjaga input jika terjadi error validasi --}}
                <input type="text"
                       class="form-control @error('nama_fakultas') is-invalid @enderror"
                       id="nama_fakultas"
                       name="nama_fakultas"
                       value="{{ old('nama_fakultas') }}"
                       placeholder="Contoh: Fakultas Teknik">

                {{-- Menampilkan pesan error validasi --}}
                @error('nama_fakultas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode_fakultas">Kode Fakultas <span class="text-danger">*</span></label>
                {{-- Input field dengan value old() untuk menjaga input jika terjadi error validasi --}}
                <input type="text"
                       class="form-control @error('kode_fakultas') is-invalid @enderror"
                       id="kode_fakultas"
                       name="kode_fakultas"
                       value="{{ old('kode_fakultas') }}"
                       placeholder="Contoh: FT">

                {{-- Menampilkan pesan error validasi --}}
                @error('kode_fakultas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <hr>

            <button type="submit" class="btn btn-success btn-block">Simpan Fakultas</button>
        </form>

    </div>
</div>
@endsection
