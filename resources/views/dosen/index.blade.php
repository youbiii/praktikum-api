@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold text-Dark">Data Dosen</h6>
        {{-- Link ke route create Dosen --}}
        <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Dosen
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Gelar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dosens->count() > 0)
                        @php $no = 1; @endphp
                        @foreach ($dosens as $dosen)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dosen->NIDN }}</td>
                                <td>{{ $dosen->Nama_Dosen }}</td>
                                <td>{{ $dosen->jabatan?->nama_jabatan ?? '— Tidak Ada —' }}</td>
                                <td>{{ $dosen->Email }}</td>
                                <td>{{ $dosen->Gelar }}</td>
                                <td>
                                    {{-- TOMBOL BARU: Link ke halaman Show/Detail --}}
                                    <a href="{{ route('dosen.show', $dosen->id) }}"
                                        class="btn btn-sm btn-info mb-1">Detail</a>

                                    {{-- Link Edit Dosen --}}
                                    <a href="{{ route('dosen.edit', $dosen->id) }}"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>

                                    {{-- Form Delete Dosen --}}
                                    <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1"
                                            onclick="return confirm('Yakin ingin menghapus data dosen ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data dosen ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
