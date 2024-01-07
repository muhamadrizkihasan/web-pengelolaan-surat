@extends('dashboard.layouts.data')

@section('users')
    <h1>Tambah Data Klasifikasi Surat</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('klasifikasi.index') }}">Data Klasifikasi Surat</a> / <a href="{{ route('klasifikasi.create') }}">Tambah Data Klasifikasi Surat</a></p>

    <div class="container-fluid">
        <form action="{{ route('klasifikasi.store') }}" class="card p-4" method="POST">
            @csrf
            {{-- Menampilkan error validasi --}}
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mb-3 mx-1">
                <label for="kode" class="form-label col-3">Kode Surat</label>
                <input type="text" name="kode" id="kode" class="form-control" placeholder="Masukan Kode Surat anda...">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="klasifikasi" class="form-label col-2">Klasifikasi Surat</label>
                <input type="text" name="klasifikasi" id="klasifikasi" class="form-control" placeholder="Masukan Klasifikasi Surat anda...">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-5">Tambah</button>
            </div>
        </form>
    </div>
@endsection