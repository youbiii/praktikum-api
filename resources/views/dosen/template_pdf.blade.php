<!DOCTYPE html>
<html>
<head>
    <title>Detail Dosen - {{ $dosen->NIDN }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
            width: 25%;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Detail Data Dosen</h1>

    <table>
        <tbody>
            <tr>
                <th>Nama Dosen</th>
                <td>{{ $dosen->Nama_Dosen }}</td>
            </tr>
            <tr>
                <th>NIDN</th>
                <td>{{ $dosen->NIDN }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $dosen->Email }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $dosen->jabatan?->nama_jabatan ?? '— Belum Ditentukan —' }}</td>
            </tr>
            <tr>
                <th>Gelar Akademik</th>
                <td>{{ $dosen->Gelar ?? '— Tidak Ada —' }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $dosen->No_HP ?? '— Tidak Ada —' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $dosen->Alamat ?? '— Tidak Ada —' }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
