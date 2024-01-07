@extends('dashboard.layouts.data')

@section('users')
    <h1>Data Guru</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('guru.index') }}">Data Guru</a></p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="{{ route('guru.index') }}" method="get">
                            <select name="entries" id="entries" onchange="this.form.submit()">
                                <option value="1" {{ request('entries') == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ request('entries') == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ request('entries') == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ request('entries') == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                            </select>
                            <label for="entries">entries per page</label>
                        </form>
                        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-round justify-content-start ml-3">
                            <i class="fa fa-plus"> </i>
                            Tambah Data
                        </a>
                        <form action="{{ route('guru.search') }}" class="ml-auto justify-content-end">
                            <input type="text" class="p-1" placeholder="Search..." name="search">
                            <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalCreate">
                                Cari
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr class="">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('guru.edit', $user->id) }}" class="btn btn-xs btn-primary mr-2"><i class="fa fa-edit"> Edit</i></a>
                                                <form action="{{ route('guru.delete', $user->id) }}" method="POST">
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