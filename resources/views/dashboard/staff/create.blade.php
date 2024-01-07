@extends('dashboard.layouts.data')

@section('users')
    <h1>Tambah Data Staff Tata Usaha</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('staff.index') }}">Data Staff Tata Usaha</a> / <a href="{{ route('staff.create') }}">Tambah Data Staff Tata Usaha</a></p>

    <div class="container-fluid">
        <form action="{{ route('staff.store') }}" class="card p-4" method="POST">
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
                <label for="name" class="form-label col-3">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama anda...">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="email" class="form-label col-2">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email anda...">
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