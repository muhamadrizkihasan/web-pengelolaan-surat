@extends('dashboard.layouts.data')

@section('users')
    <h1>Data Klasifikasi Surat</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('klasifikasi.index') }}">Data Klasifikasi Surat</a></p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <a href="{{ route('klasifikasi.create') }}" class="btn btn-primary btn-round mr-2 justify-content-start">
                            <i class="fa fa-plus"> </i>
                            Tambah Data
                        </a>
                        <a href="{{ route('klasifikasi.download-excel') }}" class="btn btn-info btn-round justify-content-center">
                            <i class="fa fa-download"> </i>
                            Export Klasifikasi Surat
                        </a>
                        <form action="{{ route('klasifikasi.search') }}" class="ml-auto justify-content-end">
                            <input type="text" class="p-1" placeholder="Search..." name="search">
                            <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-search"> Cari</i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Surat</th>
                                        <th>Klasifikasi Surat</th>
                                        <th>Surat Tertaut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($letters as $letter)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $letter->letter_code }}</td>
                                            <td>{{ $letter->name_type }}</td>
                                            <td>{{ $letter->letter_count }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('klasifikasi.show', $letter['id']) }}"class="btn btn-xs btn-info mr-2"><i class="fa fa-eye"> Lihat</i></a>
                                                <a href="{{ route('klasifikasi.edit', $letter['id']) }}"class="btn btn-xs btn-primary mr-2"><i class="fa fa-edit"> Edit</i></a>
                                                <form action="{{ route('klasifikasi.delete', $letter['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                         <i class="fa fa-trash"> Hapus</i>
                                                    </button>
                                               </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection