<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa - {{ $mahasiswa->NIM }}</title>

    {{-- CSS Sederhana untuk PDF --}}
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #333;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
            margin-bottom: 30px;
            font-size: 24px;
        }
        .detail-table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan spasi antar border */
            margin-bottom: 20px;
        }
        .detail-table th,
        .detail-table td {
            border: 1px solid #ddd; /* Border tipis untuk setiap sel */
            padding: 10px;
            text-align: left;
            vertical-align: top; /* Jaga alignment jika ada teks panjang */
        }
        .detail-table th {
            background-color: #f9f9f9; /* Warna abu-abu muda untuk header */
            font-weight: bold;
            width: 30%; /* Lebar kolom label */
        }
        .alamat {
            white-space: pre-wrap; /* Agar format alamat (enter) tetap terjaga */
            word-wrap: break-word; /* Pecah kata jika terlalu panjang */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Data Mahasiswa</h1>

        <table class="detail-table">
            <tr>
                <th>NIM</th>
                <td>{{ $mahasiswa->NIM }}</td>
            </tr>
            <tr>
                <th>Nama Mahasiswa</th>
                <td>{{ $mahasiswa->Nama_Mahasiswa }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $mahasiswa->Email }}</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>{{ $mahasiswa->prodi?->nama_prodi ?? '— Tidak Ada —' }}</td>
            </tr>
            <tr>
                <th>Dosen Pembimbing Akademik</th>
                <td>{{ $mahasiswa->dosenPA?->Nama_Dosen ?? '— Tidak Ada —' }}</td>
            </tr>
             <tr>
                <th>NIDN Dosen PA</th>
                <td>{{ $mahasiswa->dosenPA?->NIDN ?? '—' }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $mahasiswa->Jenis_Kelamin ?? '— Tidak Ada —' }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $mahasiswa->No_HP ?? '— Tidak Ada —' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td class="alamat">{{ $mahasiswa->Alamat ?? '— Tidak Ada —' }}</td>
            </tr>
        </table>

        <p style="text-align: right; font-size: 12px; color: #888;">
            Dokumen ini dibuat pada: {{ date('d-m-Y H:i:s') }}
        </p>

    </div>
</body>
</html>

