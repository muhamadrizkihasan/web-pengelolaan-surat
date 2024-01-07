@extends('dashboard.layouts.data')

@section('users')
    <h1>Edit Data Klasifikasi Surat</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('klasifikasi.index') }}">Data Klasifikasi</a> / <a href="{{ route('klasifikasi.edit', $letters['id']) }}">Edit Data Klasifikasi</a></p>

    <div class="container-fluid">
        <form action="{{ route('klasifikasi.update', $letters['id']) }}" class="card p-4" method="POST">
            @csrf
            @method('PATCH')
            {{-- Menampilkan error validasi --}}
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mb-3 mx-1">
                <label for="code" class="form-label col-3">Kode Surat</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ $letters->letter_code }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="type" class="form-label col-2">Nama Tipe</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $letters->name_type }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-5">Edit</button>
            </div>
        </form>
    </div>
@endsection