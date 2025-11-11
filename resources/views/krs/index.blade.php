@extends('layouts.app')

@section('content')
    {{-- Menampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 font-weight-bold text-primary">Filter Data KRS</h6>
        </div>
        <div class="card-body">
            {{-- Form untuk Filter --}}
            <form action="{{ route('krs.index') }}" method="GET">
                <div class="row">
                    {{-- Filter by Mahasiswa --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mahasiswa_id">Mahasiswa</label>
                            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                                <option value="">-- Semua Mahasiswa --</option>
                                @foreach ($mahasiswas as $mahasiswa)
                                    <option value="{{ $mahasiswa->id }}"
                                        {{ request('mahasiswa_id') == $mahasiswa->id ? 'selected' : '' }}>
                                        {{ $mahasiswa->NIM }} - {{ $mahasiswa->Nama_Mahasiswa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Filter by Dosen PA --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dosen_pa_id">Dosen PA</label>
                            <select name="dosen_pa_id" id="dosen_pa_id" class="form-control">
                                <option value="">-- Semua Dosen PA --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}"
                                        {{ request('dosen_pa_id') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->Nama_Dosen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Filter by Status --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Semua Status --</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}"
                                        {{ request('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Tombol Filter dan Reset --}}
                    <div class="col-md-1 d-flex align-items-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-sm">Filter</button>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <div class="form-group">
                            <a href="{{ route('krs.index') }}" class="btn btn-secondary shadow-sm">Reset</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 font-weight-bold text-primary">Data Kartu Rencana Studi (KRS)</h6>
            {{-- Link ke route create KRS --}}
            <a href="{{ route('krs.create') }}" class="btn btn-primary btn-sm shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Entri KRS
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mahasiswa</th>
                            <th>Matakuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Dosen PA</th>
                            <th>Status</th>
                            <th>Nilai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Variabel $krsEntries dilempar dari KrsController@index --}}
                        @forelse ($krsEntries as $krs)
                            <tr>
                                {{-- Gunakan $loop->iteration untuk nomor urut yang benar dengan pagination --}}
                                <td>{{ ($krsEntries->currentPage() - 1) * $krsEntries->perPage() + $loop->iteration }}</td>
                                <td>
                                    {{ $krs->mahasiswa->NIM ?? 'N/A' }} <br>
                                    <small>{{ $krs->mahasiswa->Nama_Mahasiswa ?? 'Mahasiswa Dihapus' }}</small>
                                </td>
                                <td>
                                    {{ $krs->matakuliah->Nama_matakuliah ?? 'Matakuliah Dihapus' }} <br>
                                    <small>Sem: {{ $krs->matakuliah->Semester ?? '?' }}</small>
                                </td>
                                <td>{{ $krs->matakuliah->Jumlah_sks ?? '?' }}</td>
                                <td>
                                    {{ $krs->semester_diambil }} <br>
                                    <small>{{ $krs->tahun_akademik }}</small>
                                </td>
                                <td>{{ $krs->dosenPa->Nama_Dosen ?? '— Belum Ditentukan —' }}</td>
                                <td>
                                    {{-- Badge untuk Status --}}
                                    @if ($krs->status == 'Approved' || $krs->status == 'Lulus')
                                        <span class="badge badge-success">{{ $krs->status }}</span>
                                    @elseif ($krs->status == 'Pending')
                                        <span class="badge badge-warning">{{ $krs->status }}</span>
                                    @elseif ($krs->status == 'Rejected')
                                        <span class="badge badge-danger">{{ $krs->status }}</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $krs->status ?? 'N/A' }}</span>
                                    @endif
                                </td>
                                <td><b>{{ $krs->nilai ?? '—' }}</b></td>
                                <td>
                                    {{-- Tombol Show KRS --}}
                                    <a href="{{ route('krs.show', $krs->id) }}" class="btn btn-sm btn-info mb-1">Detail</a>

                                    {{-- Tombol Edit KRS --}}
                                    <a href="{{ route('krs.edit', $krs->id) }}"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>

                                    {{-- Form Delete KRS --}}
                                    <form action="{{ route('krs.destroy', $krs->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1"
                                            onclick="return confirm('Yakin ingin menghapus entri KRS ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    Tidak ada data KRS ditemukan.
                                    @if (request()->has('mahasiswa_id') || request()->has('dosen_pa_id') || request()->has('status'))
                                        <br><small>Coba ubah atau reset filter Anda.</small>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Tautan Pagination --}}
                <div class="mt-3">
                    {{-- Tautan ini akan otomatis membawa parameter filter (karena kita pakai appends()) --}}
                    {{ $krsEntries->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
