@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-dark">Input Data Matakuliah</h4>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data Matakuliah
        </a>

    </div>
    <div class="card-body">
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf

            <div class="row">
                {{-- Kolom Kiri --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Nama_matakuliah">Nama Matakuliah <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('Nama_matakuliah') is-invalid @enderror"
                               id="Nama_matakuliah"
                               name="Nama_matakuliah"
                               value="{{ old('Nama_matakuliah') }}"
                               placeholder="Contoh: Pemrograman Web Lanjut">
                        @error('Nama_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Semester">Semester <span class="text-danger">*</span></label>
                        <input type="number"
                               class="form-control @error('Semester') is-invalid @enderror"
                               id="Semester"
                               name="Semester"
                               value="{{ old('Semester') }}"
                               placeholder="Contoh: 3">
                        @error('Semester')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Jumlah_sks">Jumlah SKS <span class="text-danger">*</span></label>
                        <input type="number"
                               class="form-control @error('Jumlah_sks') is-invalid @enderror"
                               id="Jumlah_sks"
                               name="Jumlah_sks"
                               value="{{ old('Jumlah_sks') }}"
                               placeholder="Contoh: 3">
                        @error('Jumlah_sks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prodi_id">Program Studi <span class="text-danger">*</span></label>
                        <select class="form-control @error('prodi_id') is-invalid @enderror"
                                id="prodi_id"
                                name="prodi_id">
                            <option value="">-- Pilih Program Studi --</option>

                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}"
                                    {{-- Cek 'old' value --}}
                                    {{ old('prodi_id') == $item->id ? 'selected' : '' }}>

                                    {{ $item->nama_prodi }}
                                </option>
                            @endforeach
                        </select>
                        @error('prodi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dosen_id">Dosen Pengampu</label>
                        <select class="form-control @error('dosen_id') is-invalid @enderror"
                                id="dosen_id"
                                name="dosen_id">
                            <option value="">-- Pilih Dosen Pengampu --</option>
                            @foreach ($dosens as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('dosen_id') == $item->id ? 'selected' : '' }}>

                                    {{-- Sesuaikan dengan nama kolom di tabel dosen Anda --}}
                                    {{$item->Nama_Dosen }}
                                </option>
                            @endforeach
                        </select>
                        @error('dosen_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr>

            {{-- Tombol diganti menjadi 'Simpan' --}}
            <button type="submit" class="btn btn-success btn-block">Simpan Data Matakuliah</button>
        </form>

    </div>
</div>
@endsection
