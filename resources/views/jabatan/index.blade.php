@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 font-weight-bold text-primary">Data Jabatan</h6>
        {{-- Link ke route create Jabatan --}}
        <a href="{{ route('jabatan.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jabatan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Jabatan</th>
                        <th>Kode Jabatan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Variabel $jabatans dilempar dari JabatanController@index --}}
                    @if ($jabatans->count() > 0)
                        @php $no = 1; @endphp
                        @foreach ($jabatans as $jabatan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $jabatan->id }}</td>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $jabatan->kode_jabatan ?? '— Tidak Ada —' }}</td>
                                <td>
                                    {{-- Tombol Edit Jabatan --}}
                                    <a href="{{ route('jabatan.edit', $jabatan->id) }}"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>

                                    {{-- Form Delete Jabatan --}}
                                    <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1"
                                            onclick="return confirm('Yakin ingin menghapus jabatan ini? Semua dosen yang terikat akan diset NULL.')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data jabatan ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
