@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold text-primary">Data Matakuliah</h6>
        {{-- Link ke route create Matakuliah --}}
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Matakuliah
        </a>
    </div>
    <div class="card-body">

        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Matakuliah</th>
                        <th>Semester</th>
                        <th>Jumlah SKS</th>
                        <th>Program Studi</th>
                        <th>Dosen Pengampu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($matakuliahs->count() > 0)
                        @php $no = 1; @endphp
                        @foreach ($matakuliahs as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->Nama_matakuliah }}</td>
                                <td>{{ $item->Semester }}</td>
                                <td>{{ $item->Jumlah_sks }}</td>

                                <td>{{ $item->prodi->nama_prodi ?? '— N/A —' }}</td>

                                <td>{{ $item->dosen->Nama_Dosen ?? '— Belum Ada —' }}</td>

                                <td>
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('matakuliah.show', $item->id) }}"
                                        class="btn btn-sm btn-info mb-1">Detail</a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('matakuliah.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>

                                    {{-- Form Delete --}}
                                    <form action="{{ route('matakuliah.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1"
                                            onclick="return confirm('Yakin ingin menghapus data matakuliah ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data matakuliah ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Link Paginasi --}}
        <div class="d-flex justify-content-center">
            {{ $matakuliahs->links() }}
        </div>

    </div>
</div>
@endsection
