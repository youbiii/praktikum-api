@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            {{-- DIUBAH: Judul Halaman --}}
            <h4 class="m-0 font-weight-bold text-dark">Edit Entri KRS</h4>
            <a href="{{ route('krs.index') }}" class="btn btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white"></i> Kembali ke Data KRS
            </a>
        </div>
        <div class="card-body">

            {{-- DIUBAH: Form action ke route 'update' dan sertakan ID KRS --}}
            {{-- PERBAIKAN: Kita harus secara eksplisit memberi tahu Laravel bahwa parameter 'kr' adalah $krs->id --}}
            <form action="{{ route('krs.update', ['kr' => $kr->id]) }}" method="POST">
                @csrf
                @method('PUT') {{-- DIUBAH: Wajib untuk update --}}

                <div class="row">
                    {{-- Kolom Kiri: Relasi Utama --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mahasiswa_id">Mahasiswa <span class="text-danger">*</span></label>
                            <select class="form-control @error('mahasiswa_id') is-invalid @enderror" id="mahasiswa_id"
                                name="mahasiswa_id">
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach ($mahasiswas as $mahasiswa)
                                    <option value="{{ $mahasiswa->id }}"
                                        {{ old('mahasiswa_id', $kr->mahasiswa_id) == $mahasiswa->id ? 'selected' : '' }}>
                                        {{ $mahasiswa->NIM }} - {{ $mahasiswa->Nama_Mahasiswa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="matakuliah_id">Matakuliah <span class="text-danger">*</span></label>
                            <select class="form-control @error('matakuliah_id') is-invalid @enderror" id="matakuliah_id"
                                name="matakuliah_id">
                                <option value="">-- Pilih Matakuliah --</option>
                                @foreach ($matakuliahs as $matakuliah)
                                    <option value="{{ $matakuliah->id }}" {{-- DIUBAH: Logika 'selected' untuk form edit --}}
                                        {{ old('matakuliah_id', $kr->matakuliah_id) == $matakuliah->id ? 'selected' : '' }}>
                                        {{ $matakuliah->Nama_matakuliah }} (Sem: {{ $matakuliah->Semester }})
                                    </option>
                                @endforeach
                            </select>
                            @error('matakuliah_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dosen_pa_id">Dosen PA (Penyetuju)</label>
                            <select class="form-control @error('dosen_pa_id') is-invalid @enderror" id="dosen_pa_id"
                                name="dosen_pa_id">
                                <option value="">-- Pilih Dosen PA --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{-- DIUBAH: Logika 'selected' untuk form edit --}}
                                        {{ old('dosen_pa_id', $kr->dosen_pa_id) == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->Nama_Dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen_pa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Kolom Kanan: Detail KRS --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tahun_akademik">Tahun Akademik <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('tahun_akademik') is-invalid @enderror"
                                id="tahun_akademik" name="tahun_akademik" {{-- DIUBAH: Isi value dengan data dari DB --}}
                                value="{{ old('tahun_akademik', $kr->tahun_akademik) }}" placeholder="cth: 2024/2025">
                            @error('tahun_akademik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="semester_diambil">Semester Diambil <span class="text-danger">*</span></label>
                            <select class="form-control @error('semester_diambil') is-invalid @enderror"
                                id="semester_diambil" name="semester_diambil">
                                <option value="">-- Pilih Semester --</option>
                                {{-- DIUBAH: Logika 'selected' untuk form edit --}}
                                <option value="Ganjil"
                                    {{ old('semester_diambil', $kr->semester_diambil) == 'Ganjil' ? 'selected' : '' }}>
                                    Ganjil</option>
                                <option value="Genap"
                                    {{ old('semester_diambil', $kr->semester_diambil) == 'Genap' ? 'selected' : '' }}>
                                    Genap</option>
                                <option value="Pendek"
                                    {{ old('semester_diambil', $kr->semester_diambil) == 'Pendek' ? 'selected' : '' }}>
                                    Pendek</option>
                            </select>
                            @error('semester_diambil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                {{-- DIUBAH: Logika 'selected' untuk form edit --}}
                                <option value="Pending" {{ old('status', $kr->status) == 'Pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="Approved" {{ old('status', $kr->status) == 'Approved' ? 'selected' : '' }}>
                                    Approved</option>
                                <option value="Rejected" {{ old('status', $kr->status) == 'Rejected' ? 'selected' : '' }}>
                                    Rejected</option>
                                <option value="Lulus" {{ old('status', $kr->status) == 'Lulus' ? 'selected' : '' }}>Lulus
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai"
                                name="nilai" {{-- DIUBAH: Isi value dengan data dari DB --}} value="{{ old('nilai', $kr->nilai) }}"
                                placeholder="cth: A, B+, C. Kosongkan jika belum ada.">
                            @error('nilai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                {{-- DIUBAH: Teks dan warna tombol --}}
                <button type="submit" class="btn btn-warning btn-block">Update Entri KRS</button>
            </form>

        </div>
    </div>
@endsection
