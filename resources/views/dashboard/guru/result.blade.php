@extends('dashboard.layouts.data')

@section('users')
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('letter.index') }}">Data Surat</a> / <a href="/#">Hasil Rapat</a></p>
    <div class="mb-3 h3 mb-4">Hasil Rapat</div>
        <div class="card">
            <div class="card-body">
            
            <form action="{{ route('result.store') }}" method="POST">
                @csrf
                <h5>Kehadiran :</h5>
                <h6>Peserta Yang Hadir</h6>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                        </tr>
                        @foreach ($user as $item) 
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckChecked" name="presence_recipients[]">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                <div>
                    <label for="body" class="form-label mt-2">Ringkasan Hasil Rapat:</label>
                    <input id="body" type="hidden" name="content">
                    <trix-editor input="body" placeholder="Hasil Rapat..."></trix-editor>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-info text-white">Buat</button>
                </div>
            </form>
        </div>
    </div>
@endsection