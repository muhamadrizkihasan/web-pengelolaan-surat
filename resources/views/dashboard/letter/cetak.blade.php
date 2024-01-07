@extends('dashboard.layouts.data')

@section('users')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 40px;
        background-color: #f0f0f0;
    }

    img {
        max-width: 70px;
        max-height: 70px;
        display: block;
        margin: 20px 0;
    }

    h1 {
        text-align: start;
        margin-bottom: 20px;
        color: #333;
    }

    .info-container {
        display: flex;
        justify-content: space-between;
    }

    .kiri {
        width: 30%;
        padding: 20px;
    }

    .kanan {
        width: 40%;
        padding: 20px;
    }

    .kanan p,
    .kiri p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .date {
        padding: 20px;
        text-align: end;
    }

    .kiri-2,
    .kanan-2,
    .content,
    .user,
    .hormat,
    .ttd {
        margin-top: 20px;
        padding: 20px;
    }

    .content pre {
        white-space: pre-wrap;
    }

    .user ol {
        padding-left: 20px;
    }

    .hormat p {
        text-align: end;
        font-weight: bold;
    }

    .ttd {
        text-align: right;
    }

    .form {
        width: 80%;
        margin: 0 auto; /* Ini akan membuat formulir berada di tengah secara horizontal */
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .bungkus {
        display: flex;
        justify-content: space-between;
    }

    .kanan-2 {
        justify-content: end;
    }

    .konten {
        font-size: 1rem;
    }

    hr {
        border: 0;
        height: 2px;    
        background-color: #333;
    }

    </style>
</head>
<body>
    <div class="row mt-3">
        <div class="col-9 mb-4"></div>
        <div class="col-3 mb-4">
            <a href="{{ route('letter.index') }}" class="btn btn-link">Kembali</a>
            <a href="{{ route('letter.download-pdf', $letters->id) }}" class="btn btn-secondary">Cetak Surat</a>
        </div>
    </div>
    <div class="form">
        <div class="bungkus">
            <img src="{{ asset('wk.png') }}" alt="Logo Wikrama">

            <div class="kanan">
                <h1>SMK WIKRAMA BOGOR</h1><hr>
                <p>Bisnis dan Manajemen</p>
                <p>Teknologi Informasi dan Komunikasi</p>
                <p>Pariwisata</p>
            </div>

            <div class="kiri">
                <p>Jl. Raya Wangun Kel. Sindangsari Bogor</p>
                <p>Telp/Faks: (0251)8242411</p>
                <p>e-mail: prohumasi@smkwikrama.sch.id</p>
                <p>website: www.skmikrama.sch.id</p>
            </div>
        </div>
    <hr>

    <div class="date">
        17 Desember 2023
    </div>

    <div class="bungkus">
    <div class="kiri-2">
        <p>No : 220604-1/0002/SMK Wikrama/XII/2023</p>
        <p>Hal : Rapat Rutin</p>
    </div>

    <div class="kanan-2">
        <p>Kepada</p>
        <p>Yth. Bapak/Ibu Terlampir</p>
        <p>Di Tempat</p>
    </div>
    </div>
    <p>Assalamualaikum Wr. Wb.</p>
    <p>Sehubungan dengan akan dilaksanakan kegiatan Penilaian Akhir Semestet(PAS), maka dengan ini kami mengundang seluruh Bapak/Ibu Guru & Laboran untuk hadir pada acara rapat yang akan dilaksanakan pada :</p>

    <div class="content">
        <pre class="">
    Hari, Tanggal : Rabu, 15 Desember 2023
    Waktu         : 16:00 WIB - Selesai
    Tempat        : Workshop Guru
    Agenda        : 1. Laporan KBM Reguler
                    2. Penyusunan Waktu Kegiatan PAS Tiap Mapel
        </pre>
    </div>

    <p>Demikian undangan ini kami sampaikan, atas perhatian dan kerja keras semuanya kami ucapkan terima kasih.</p>
    <p>Wassalamualaikum Wr. Wb.</p>

    <div class="user">
        <ol>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ol>
    </div>

    <div class="hormat">
        <p>Hormat Kami</p>
        <p>Kepala SMK Wikrama Bogor</p>
    </div>

    <div class="ttd">
        (....................)
    </div>
</div>
</body>
</html>
@endsection