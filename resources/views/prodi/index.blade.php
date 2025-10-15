@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Table Prodi</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Prodi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name Prodi</th>
                                            <th>Kode Prodi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($dataProdi->count() > 0)
                                            @php $no = 1; @endphp
                                                @foreach ($dataProdi as $prodi)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $prodi->nama_prodi }}</td>
                                                        <td>{{ $prodi->kode_prodi }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" class="text-center">Data tidak ditemukan</td>
                                                </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
