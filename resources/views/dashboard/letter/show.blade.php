@extends('dashboard.layouts.data')

@section('users')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>

    <style>
        #back-wrap{
            margin: 50px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back{
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
        }

    body {
        font-family: 'Arial', sans-serif;
        margin: 40px;
        background-color: #f0f0f0;
    }

    img {
        max-width: 100px;
        display: block;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .info-container {
        display: flex;
        justify-content: space-between;
    }

    .kanan,
    .kiri {
        width: 48%;
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
        width: 50%; /* Sesuaikan dengan lebar yang diinginkan */
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

    pre {
        font-size: 1rem;
    }

    #button-wrap {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .btn-back, .btn-print {
            padding: 8px 15px;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-back {
            background: #666;
        }

        .btn-print {
            background: #007bff;
        }

    </style>
</head>
<body>
    <p><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('letter.index') }}">Data Surat</a> / <a href="#">Detail Data Surat</a></p>

    <div class="form">
    <img src="{{ asset('wk.png') }}" alt="">

    <h1>SMK WIKRAMA BOGOR</h1>
    
    <div class="bungkus">
    <div class="kanan">
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
        {{ $letter->created_at->format('d-m-Y') }}
    </div>

    <div class="bungkus">
    <div class="kiri-2">
        <p>No : 220604-1/0002/SMK Wikrama/XII/2023</p>
        <p>Hal : {{ $letter->letter_perihal }}</p>
    </div>

    <div class="kanan-2">
        <p>Kepada</p>
        <p>Yth. Bapak/Ibu Terlampir</p>
        <p>Di Tempat</p>
    </div>
    </div>

    <div class="content">
        @php
            $content = strip_tags($letter->content);
        @endphp
        {{ $content }}
    </div>
    
    <div class="user">
        <p>Anggota Yang Menghadiri</p>
        <ol>
            <li>
                {{ implode(', ', array_column($letter->recipients, 'name')) }}</
            </li>
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


<div class="lampiran" style="margin-top: 100px">
    <center>
        {{ $letter->attachment }}
    </center>
</div>
</body>
</html>
@endsection