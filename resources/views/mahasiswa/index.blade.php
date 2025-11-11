@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        {{-- Link ke route create Mahasiswa --}}
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mahasiswa
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Program Studi</th>
                        <th>Dosen PA</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Variabel $mahasiswas dilempar dari MahasiswaController@index --}}
                    @if ($mahasiswa->count() > 0)
                        @php $no = 1; @endphp
                        @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->NIM }}</td>
                                <td>{{ $item->Nama_Mahasiswa }}</td>

                                {{-- Mengakses Relasi Prodi --}}
                                <td>{{ $item->prodi->nama_prodi ?? '— N/A —' }}</td>

                                {{-- Mengakses Relasi Dosen PA --}}
                                <td>{{ $item->dosenPa->Nama_Dosen ?? '— Belum Ada —' }}</td>

                                <td>{{ $item->Email }}</td>

                                <td>
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('mahasiswa.show', $item->id) }}"
                                        class="btn btn-sm btn-info mb-1">Detail</a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('mahasiswa.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>

                                    {{-- Form Delete --}}
                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1"
                                            onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data mahasiswa ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
