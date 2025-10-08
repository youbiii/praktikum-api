@extends('layout.app')
@section('content')




    <div class="form-container">
        <h1>Form Input Data Fakultas</h1>

        {{-- The form will send a POST request to the '/fakultas' route --}}
        <form action="/fakultas" method="POST">
            {{-- CSRF token is crucial for security in Laravel --}}
            @csrf

            <div class="form-group">
                <label for="kode_fakultas">Kode Fakultas</label>
                <input type="text" id="kode_fakultas" name="kode_fakultas" class="form-control" placeholder="Contoh: FT" required>
            </div>

            <div class="form-group">
                <label for="nama_fakultas">Nama Fakultas</label>
                <input type="text" id="nama_fakultas" name="nama_fakultas" class="form-control" placeholder="Contoh: Fakultas Teknik" required>
            </div>

            <div class="form-group">
                <label for="dekan">Nama Dekan</label>
                <input type="text" id="dekan" name="dekan" class="form-control" placeholder="Masukkan nama dekan saat ini">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Berikan deskripsi singkat mengenai fakultas"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>



@endsection
