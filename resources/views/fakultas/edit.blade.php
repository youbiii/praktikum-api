@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Fakultas</h1>

<form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
        <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}" required>
    </div>

    <div class="mb-3">
        <label for="kode_fakultas" class="form-label">Kode Fakultas</label>
        <input type="text" class="form-control" id="kode_fakultas" name="kode_fakultas" value="{{ old('kode_fakultas', $fakultas->kode_fakultas) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Batal</a>
</form>
    </div>
@endsection
