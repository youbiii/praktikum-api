@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Input Data Mahasiswa</h4>

            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data Mahasiswa
            </a>

        </div>
        <div class="card-body">

            {{-- Form akan mengirim data ke Route 'mahasiswas.store' --}}
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Kolom Kiri: Identitas Utama --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="NIM">NIM <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM"
                                name="NIM" value="{{ old('NIM') }}" placeholder="Contoh: 20210001">
                            @error('NIM')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nama_Mahasiswa">Nama Mahasiswa <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('Nama_Mahasiswa') is-invalid @enderror"
                                id="Nama_Mahasiswa" name="Nama_Mahasiswa" value="{{ old('Nama_Mahasiswa') }}"
                                placeholder="Contoh: Risa Lestari">
                            @error('Nama_Mahasiswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('Email') is-invalid @enderror" id="Email"
                                name="Email" value="{{ old('Email') }}" placeholder="Contoh: risa@student.ac.id">
                            @error('Email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Jenis_Kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('Jenis_Kelamin') is-invalid @enderror" name="Jenis_Kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('Jenis_Kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('Jenis_Kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('Jenis_Kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Kolom Kanan: Relasi & Kontak --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prodi_id">Program Studi <span class="text-danger">*</span></label>
                            {{-- Dropdown untuk Foreign Key Prodi --}}
                            <select class="form-control @error('prodi_id') is-invalid @enderror" id="prodi_id"
                                name="prodi_id">
                                <option value="">-- Pilih Program Studi --</option>

                                {{-- $prodis diambil dari MahasiswaController@create --}}
                                @foreach ($prodi as $prodi)
                                    <option value="{{ $prodi->id }}"
                                        {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dosen_pa_id">Dosen Pembimbing Akademik (PA)</label>
                            {{-- Dropdown untuk Foreign Key Dosen PA --}}
                            <select class="form-control @error('dosen_pa_id') is-invalid @enderror" id="dosen_pa_id"
                                name="dosen_pa_id">
                                <option value="">-- Pilih Dosen PA --</option>

                                {{-- $dosens diambil dari MahasiswaController@create --}}
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}"
                                        {{ old('dosen_pa_id') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->Nama_Dosen }} ({{ $dosen->NIDN }})
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen_pa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="No_HP">Nomor HP</label>
                            <input type="text" class="form-control @error('No_HP') is-invalid @enderror" id="No_HP"
                                name="No_HP" value="{{ old('No_HP') }}" placeholder="Contoh: 081234567890">
                            @error('No_HP')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Alamat">Alamat Lengkap</label>
                    <textarea class="form-control @error('Alamat') is-invalid @enderror" id="Alamat" name="Alamat" rows="3"
                        placeholder="Alamat lengkap mahasiswa">{{ old('Alamat') }}</textarea>
                    @error('Alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <button type="submit" class="btn btn-success btn-block">Simpan Data Mahasiswa</button>
            </form>

        </div>
    </div>
@endsection
