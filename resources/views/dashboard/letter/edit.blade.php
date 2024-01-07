@extends('dashboard.layouts.data')

@section('users')
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <h1>Edit Data Surat</h1>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('letter.index') }}">Data Surat</a> / <a href="#">Edit Data Surat</a></p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('letter.update', $letter->id) }}" class="card p-4 mt-5 d-flex" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Menampilkan error validasi --}}
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3 mx-1">
                            <label for="letter_perihal" class="form-label col-2">Perihal :</label>
                            <input type="text" name="letter_perihal" id="letter_perihal" value="{{ $letter->letter_perihal }}" class="form-control">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="mb-3 mx-1">
                            <label for="letter_type_id" class="form-label col-3">Klasifikasi Surat :</label>
                            <select class="form-select" name="letter_type_id" id="letter_type_id" aria-label="Default select example">
                                <option selected value="{{ $letter->letter_type_id }}">{{ $letter->name_type }}</option>
                                @foreach ($letters as $letter)
                                    <option value="{{ $letter->id }}" >{{ $letter->name_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                    <div>
                        <label for="body" class="form-label mt-2">Isi Surat :</label>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="content">
                        <trix-editor input="body" value="{{ $letter->content }}"></trix-editor>
                    </div>
                    
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>Peserta (Ceklist jika "ya")</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td for="flexCheckChecked{{ $user->id }}">{{ $user->name }}</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $user->id }}" id="flexCheckChecked{{ $user->id }}" name="recipients[]" @if(in_array($user->id, $letter->recipients ?? [])) checked @endif>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <tr>
                        
                    </tr>
                    <label for="attachment" class="mt-4">Lampiran :</label>
                    <input type="file" name="attachment" id="attachment">

                    <div class="mt-3 mx-1">
                        <label for="notulis" class="form-label col-3 mt-3">Notulis :</label>
                        <select class="form-select" name="notulis" id="notulis">
                            <option selected value="{{ $letter->letter_type_id }}">{{ $letter->notulis }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary px-5">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Trix Editor --}}
<script type="text/javascript" src="../../js/trix.js"></script>
@endsection