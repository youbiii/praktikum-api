@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-dark">Input Data Dosen</h4>

        <a href="{{ route('dosen.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data Dosen    
        </a>

    </div>
    <div class="card-body">
        {{-- Form akan mengirim data ke Route 'dosens.store' --}}
        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf

            <div class="row">
                {{-- Kolom Kiri: Identitas Utama --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Nama_Dosen">Nama Dosen <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('Nama_Dosen') is-invalid @enderror"
                               id="Nama_Dosen"
                               name="Nama_Dosen"
                               value="{{ old('Nama_Dosen') }}"
                               placeholder="Contoh: Dr. Ir. Budi Santoso">
                        @error('Nama_Dosen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="NIDN">NIDN <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('NIDN') is-invalid @enderror"
                               id="NIDN"
                               name="NIDN"
                               value="{{ old('NIDN') }}"
                               placeholder="Contoh: 0012345678">
                        @error('NIDN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Email">Email <span class="text-danger">*</span></label>
                        <input type="email"
                               class="form-control @error('Email') is-invalid @enderror"
                               id="Email"
                               name="Email"
                               value="{{ old('Email') }}"
                               placeholder="Contoh: budi.santoso@kampus.ac.id">
                        @error('Email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Kolom Kanan: Detail Kontak & Relasi --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jabatan_id">Jabatan <span class="text-danger">*</span></label>
                        {{-- Dropdown untuk Foreign Key (Relasi ke tabel jabatans) --}}
                        <select class="form-control @error('jabatan_id') is-invalid @enderror"
                                id="jabatan_id"
                                name="jabatan_id">
                            <option value="">-- Pilih Jabatan --</option>

                            {{-- $jabatans diambil dari DosenController@create --}}
                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}"
                                    {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                                    {{ $jabatan->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Gelar">Gelar Akademik</label>
                        <input type="text"
                               class="form-control @error('Gelar') is-invalid @enderror"
                               id="Gelar"
                               name="Gelar"
                               value="{{ old('Gelar') }}"
                               placeholder="Contoh: S.T., M.Kom., Ph.D.">
                        @error('Gelar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="No_HP">Nomor HP</label>
                        <input type="text"
                               class="form-control @error('No_HP') is-invalid @enderror"
                               id="No_HP"
                               name="No_HP"
                               value="{{ old('No_HP') }}"
                               placeholder="Contoh: 081234567890">
                        @error('No_HP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="Alamat">Alamat Lengkap</label>
                <textarea class="form-control @error('Alamat') is-invalid @enderror"
                          id="Alamat"
                          name="Alamat"
                          rows="3"
                          placeholder="Alamat lengkap dosen">{{ old('Alamat') }}</textarea>
                @error('Alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <button type="submit" class="btn btn-success btn-block">Simpan Data Dosen</button>
        </form>

    </div>
</div>
@endsection
