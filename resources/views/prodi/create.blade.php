@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Input Data Prodi</h4>

            <a href="{{ route('prodi.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data Prodi
            </a>
        </div>

        <div class="card-body">
            {{-- Form akan mengirim data ke Route 'prodi.store' --}}
            {{-- Gunakan method POST --}}
            <form action="{{ route('prodi.store') }}" method="POST">
                @csrf {{-- Token keamanan Laravel wajib ada untuk semua form POST --}}

                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi <span class="text-danger">*</span></label>
                    {{-- Input field dengan value old() untuk menjaga input jika terjadi error validasi --}}
                    <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi"
                        name="nama_prodi" value="{{ old('nama_prodi') }}" placeholder="Contoh: Teknik Informatika">

                    {{-- Menampilkan pesan error validasi --}}
                    @error('nama_prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    {{-- PERBAIKAN LABEL: 'for' harus 'kode_prodi', bukan 'kode_fakultas' --}}
                    <label for="kode_prodi">Kode Prodi <span class="text-danger">*</span></label>
                    {{-- Input field dengan value old() untuk menjaga input jika terjadi error validasi --}}
                    <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                        name="kode_prodi" value="{{ old('kode_prodi') }}" placeholder="Contoh: TI">

                    {{-- Menampilkan pesan error validasi --}}
                    @error('kode_prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- TAMBAHAN YANG HILANG: Dropdown Fakultas --}}
                <div class="form-group">
                    <label for="fakultas_id">Fakultas <span class="text-danger">*</span></label>
                    {{-- Dropdown ini mengambil data dari $fakultas yang dikirim Controller --}}
                    <select class="form-control @error('fakultas_id') is-invalid @enderror" id="fakultas_id" name="fakultas_id">
                        <option value="" selected disabled>-- Pilih Fakultas --</option>

                        {{-- Loop semua data fakultas --}}
                        @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}" {{ old('fakultas_id') == $item->id ? 'selected' : '' }}>
                                {{-- Ganti 'nama_fakultas' jika nama kolom Anda berbeda (misal: 'nama') --}}
                                {{ $item->nama_fakultas }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Menampilkan pesan error validasi --}}
                    @error('fakultas_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Akhir Tambahan --}}

                <hr>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
@endsection
