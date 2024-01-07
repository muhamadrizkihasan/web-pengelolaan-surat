@extends('dashboard.layouts.data')

@section('users')
    <h1>Detail Klasifikasi Surat</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('klasifikasi.index') }}">Klasifikasi Surat</a> / <a href="{{ route('klasifikasi.show', $letter->id) }}">Detail Klasifikasi Surat</a></p>

    <div class="container-fluid">
        <h1><span class="text-primary">{{ $letter->letter_code }}</span> | {{ $letter->name_type }}</h1>

        <div class="card mt-3" style="width: 28rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col-11">
                        <h4>{{ $letter->name_type }}</h4>
                    </div>
                    <div class="col-1">
                        <a href="{{ route('klasifikasi.download-pdf', $letter->id) }}"><i class="fa fa-download"></i></a>
                    </div>
                </div>
                <h6>{{ Carbon\Carbon::parse($letter['created_at'])->formatLocalized('%d %B %Y') }}</h6>
                
                <ol>
                    @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection