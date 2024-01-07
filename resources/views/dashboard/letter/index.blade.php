@extends('dashboard.layouts.data')

@section('users')
    <h1>Data Surat</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('letter.index') }}">Data Surat</a></p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        @if (Auth::user()->role == 'staff')
                            <a href="{{ route('letter.create') }}" class="btn btn-primary btn-round mr-2 justify-content-start">
                                <i class="fa fa-plus"> </i>
                                Tambah Data
                            </a>
                            <a href="{{ route('letter.download-excel') }}" class="btn btn-info btn-round justify-content-center">
                                <i class="fa fa-download"> </i>
                                Export Data Surat
                            </a>
                        @endif

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
                                    <tr>
                                        <th>No</th>
                                        <th>Nomer Surat</th>
                                        <th>Perihal</th>
                                        <th>Tanggal </th>
                                        <th>Penerima Surat</th>
                                        <th>Notulis</th>
                                        <th>Hasil Rapat</th>
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
                                            <td>{{ $letter->id }}/000{{ $letter->letter_type_id }}/SMK Wikrama/XII/2023</td>
                                            <td>{{ $letter->letter_perihal }}</td>
                                            <td>{{ Carbon\Carbon::parse($letter['created_at'])->formatLocalized('%d %B %Y') }}</td>
                                            {{-- <td>
                                                @php
                                                    // Karena menggunakan trix editor jadi, misal ketika membuat text menjadi garis miring maka text tersebut akan dibungkus didalam tag <i></i>.
                                                    // Jadi ini berfungsi untuk menghilangkan tag HTML
                                                    $content = strip_tags($letter->content);
                                                @endphp
                                                {{ $content }}
                                            </td> --}}
                                            <td>
                                                {{ implode(", ", array_column($letter->recipients, 'name')) }}
                                            </td>
                                            <td>Pak Hasan</td>
                                            <td>
                                                @if (Auth::check())
                                                    @if (App\Models\Result::where('letter_id', $letter->id)->exists())
                                                    <a href="{{ route('result.show', $letter->id) }}" style="color: green">Sudah Dibuat</a>
                                                    @else
                                                        {{-- @if (Auth::user()->name == $letter->user->name) --}}
                                                        <div class="row">
                                                        <div class="col">
                                                            @if (Auth::user()->role == 'guru')
                                                                <a href="{{ route('result.create', $letter->id) }}"><button class="btn btn-success text-white d-flex">Buat Hasil</button></a>
                                                            @endif
                                                        </div>
                                                        {{-- @else --}}
                                                        <div class="col">
                                                            <a href="#" style="color: red">Belum Dibuat</a>
                                                        </div>
                                                        </div>
                                                    {{-- @endif --}}
                                                @endif
                                        
                                                @else
                                                    
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('letter.show', $letter->id) }}"class="btn btn-xs btn-info mr-2"><i class="fa fa-eye"> Lihat</i></a>
                                                @if (Auth::user()->role == 'staff')
                                                    <a href="{{ route('letter.edit', $letter->id) }}"class="btn btn-xs btn-primary mr-2"><i class="fa fa-edit"> Edit</i></a>
                                                    <form action="{{ route('letter.delete', $letter->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"> Hapus</i>
                                                        </button>
                                                    </form>
                                               @endif
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