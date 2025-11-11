@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-dark">Edit Data Prodi</h4>
            <a href="{{ route('prodi.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data Prodi
            </a>
        </div>

        <div class="card-body">
            {{-- Form akan mengirim data ke Route 'prodi.update' --}}
            {{-- Gunakan method POST, tetapi di dalamnya pakai @method('PUT') --}}
            <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                @csrf {{-- Token keamanan Laravel --}}
                @method('PUT') {{-- Menandakan bahwa ini adalah request UPDATE/PUT --}}

                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi <span class="text-danger">*</span></label>
                    {{-- 'value' diisi dengan data yang ada --}}
                    <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi"
                        name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" placeholder="Contoh: Teknik Informatika">

                    @error('nama_prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kode_prodi">Kode Prodi <span class="text-danger">*</span></label>
                    {{-- 'value' diisi dengan data yang ada --}}
                    <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                        name="kode_prodi" value="{{ old('kode_prodi', $prodi->kode_prodi) }}" placeholder="Contoh: TI">

                    @error('kode_prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fakultas_id">Fakultas <span class="text-danger">*</span></label>
                    {{-- Dropdown ini mengambil data dari $fakultas --}}
                    <select class="form-control @error('fakultas_id') is-invalid @enderror" id="fakultas_id" name="fakultas_id">
                        <option value="" selected disabled>-- Pilih Fakultas --</option>

                        @foreach ($fakultas as $item)
                            {{--
                              Cek apakah $item->id sama dengan fakultas_id prodi ini.
                              Kita juga cek 'old()' untuk menjaga data jika validasi gagal.
                            --}}
                            <option value="{{ $item->id }}" {{ old('fakultas_id', $prodi->fakultas_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_fakultas }}
                            </option>
                        @endforeach
                    </select>

                    @error('fakultas_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <hr>

                <button type="submit" class="btn btn-warning btn-block">Update Data</button>
            </form>
        </div>
    </div>
@endsection
