@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">

    {{-- Grup Teks di Sebelah Kiri --}}
    <div>
        <h1 class="h3 mb-0 text-gray-800">Tabel Fakultas</h1>
        <p class="mb-0">Data fakultas Universitas Pahlawan.</p>
    </div>

    {{-- Tombol di Sebelah Kanan --}}
    <a href="{{ route('fakultas.create') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Fakultas
    </a>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Fakultas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Fakultas</th>
                        <th>Kode Fakultas</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataFakultas->count() > 0)
                        @php $no = 1; @endphp
                        @foreach ($dataFakultas as $fakultas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                {{-- Akses kolom sebagai properti objek Eloquent --}}
                                <td>{{ $fakultas->id }}</td>
                                <td>{{ $fakultas->nama_fakultas }}</td>
                                <td>{{ $fakultas->kode_fakultas }}</td>
                                <td>{{ $fakultas->created_at }}</td>
                                <td>{{ $fakultas->updated_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        {{-- Tampilkan pesan jika data kosong --}}
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data fakultas ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
