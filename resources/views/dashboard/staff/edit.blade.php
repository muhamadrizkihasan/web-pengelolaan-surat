@extends('dashboard.layouts.data')

@section('users')
    <h1>Edit Data Staff Tata Usaha</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('staff.index') }}">Data Staff Tata Usaha</a> / <a href="{{ route('staff.edit', $users['id']) }}">Edit Data Staff Tata Usaha</a></p>

    <div class="container-fluid">
        <form action="{{ route('staff.update', $users['id']) }}" class="card p-4" method="POST">
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
                <label for="name" class="form-label col-3">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama anda..." value="{{ $users->name }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="email" class="form-label col-2">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email anda..." value="{{ $users->email }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 mx-1">
                <label for="Password" class="form-label col-2">Password</label>
                <input type="Password" name="Password" id="Password" class="form-control">
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