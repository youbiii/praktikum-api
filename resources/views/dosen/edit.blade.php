@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0 font-weight-bold text-Dark">Edit Data Dosen: {{ $dosen->Nama_Dosen }}</h4>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
    <div class="card-body">

        {{-- Display Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Form for Updating Dosen Data --}}
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Use PUT method for update operations --}}

            {{-- NIDN Field --}}
            <div class="form-group">
                <label for="NIDN">NIDN</label>
                <input type="text" class="form-control @error('NIDN') is-invalid @enderror" id="NIDN" name="NIDN"
                    value="{{ old('NIDN', $dosen->NIDN) }}" required>
                @error('NIDN')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nama Dosen Field --}}
            <div class="form-group">
                <label for="Nama_Dosen">Nama Dosen</label>
                <input type="text" class="form-control @error('Nama_Dosen') is-invalid @enderror" id="Nama_Dosen" name="Nama_Dosen"
                    value="{{ old('Nama_Dosen', $dosen->Nama_Dosen) }}" required>
                @error('Nama_Dosen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email Field --}}
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control @error('Email') is-invalid @enderror" id="Email" name="Email"
                    value="{{ old('Email', $dosen->Email) }}" required>
                @error('Email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gelar Field --}}
            <div class="form-group">
                <label for="Gelar">Gelar (e.g., S.Kom., M.T.)</label>
                <input type="text" class="form-control @error('Gelar') is-invalid @enderror" id="Gelar" name="Gelar"
                    value="{{ old('Gelar', $dosen->Gelar) }}">
                @error('Gelar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jabatan (Position) Dropdown Field --}}
            <div class="form-group">
                <label for="jabatan_id">Jabatan</label>
                <select class="form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id">
                    <option value="">Pilih Jabatan</option>
                    @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}"
                            {{ old('jabatan_id', $dosen->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                            {{ $jabatan->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
                @error('jabatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning btn-block mt-4">Update Data Dosen</button>
        </form>

    </div>
</div>
@endsection
