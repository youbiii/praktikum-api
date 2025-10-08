@extends('layout.app')
@section('content')
<<<<<<< HEAD




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
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        thead {
            background-color: #4CAF50;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h1>Daftar Data Pengguna</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Usia</th>
                <th>Kota</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Budi Santoso</td>
                <td>28</td>
                <td>Jakarta</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Citra Lestari</td>
                <td>24</td>
                <td>Bandung</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Agus Setiawan</td>
                <td>32</td>
                <td>Surabaya</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Dewi Anggraini</td>
                <td>29</td>
                <td>Yogyakarta</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
@endsection
>>>>>>> 2d4ddbc95a926ccc27f10945dc80b19de5f6d7a6
