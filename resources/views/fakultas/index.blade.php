@extends('layouts.app')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 font-weight-bold text-primary">Data Fakultas</h6>
            <a href="{{ route('fakultas.create') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Fakultas
            </a>
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
                            <th>Actions</th>
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
                                    <td>
                                        <a href="{{ route('fakultas.edit', $fakultas->id) }}"
                                            class="btn btn-sm btn-warning mb-1">Edit</a>
                                        <form action="{{ route('fakultas.destroy', $fakultas->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mb-1"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
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
