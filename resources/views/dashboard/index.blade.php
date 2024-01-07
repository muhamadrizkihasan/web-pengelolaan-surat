@extends('dashboard.layouts.data')

@section('users')
    <h1 class="m-0">Dashboard</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('dashboard') }}">Dashboard</a></p>

    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif

    @if ((Auth::user()->role == 'guru'))
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Surat Masuk</h4>
                        <h4><i class="nav-icon far fa-envelope mt-3"></i> {{ $letters }}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ((Auth::user()->role == 'staff'))
        <div class="row m-2">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Surat Keluar</h4>
                        <h4><i class="nav-icon far fa-envelope mt-3"></i> {{ $letters }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Klasifikasi Surat</h4>
                        <h4><i class="nav-icon far fa-envelope mt-3"></i> {{ $letterTypes }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Staff Tata Usaha</h4>
                        <h4>
                            <i class="nav-icon far fa-user"> {{ $staffs }}</i> 
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Guru</h4>
                        <h4><i class="nav-icon far fa-user"></i> {{ $teachers }}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection