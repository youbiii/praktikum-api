@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 font-weight-bold text-Dark">Edit Data Matakuliah: {{ $matakuliah->Nama_matakuliah }}</h4>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama_matakuliah">Nama Matakuliah <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('Nama_matakuliah') is-invalid @enderror"
                                id="Nama_matakuliah" name="Nama_matakuliah"
                                value="{{ old('Nama_matakuliah', $matakuliah->Nama_matakuliah) }}"
                                placeholder="Contoh: Pemrograman Web Lanjut">
                            @error('Nama_matakuliah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Semester">Semester <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('Semester') is-invalid @enderror"
                                id="Semester" name="Semester"
                                value="{{ old('Semester', $matakuliah->Semester) }}" placeholder="Contoh: 3">
                            @error('Semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Jumlah_sks">Jumlah SKS <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('Jumlah_sks') is-invalid @enderror"
                                id="Jumlah_sks" name="Jumlah_sks"
                                value="{{ old('Jumlah_sks', $matakuliah->Jumlah_sks) }}" placeholder="Contoh: 3">
                            @error('Jumlah_sks')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prodi_id">Program Studi <span class="text-danger">*</span></label>
                            <select class="form-control @error('prodi_id') is-invalid @enderror" id="prodi_id"
                                name="prodi_id">
                                <option value="">-- Pilih Program Studi --</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('prodi_id', $matakuliah->prodi_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_prodi ?? $item->Nama_Prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dosen_id">Dosen Pengampu</label>
                            <select class="form-control @error('dosen_id') is-invalid @enderror" id="dosen_id"
                                name="dosen_id">
                                <option value="">-- Pilih Dosen Pengampu --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}"
                                        {{ old('dosen_id', $matakuliah->dosen_id) == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nama_dosen ?? $dosen->Nama_Dosen }}
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

                {{-- DIUBAH: Tombol submit untuk update --}}
                <button type="submit" class="btn btn-warning btn-block mt-4">Update Data Matakuliah</button>
            </form>

        </div>
    </div>
@endsection
