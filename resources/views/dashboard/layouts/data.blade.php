<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengelolaan Surat</title>

  {{-- Assets link css, font & icon  --}}
  @extends('dashboard.layouts.link')

  <link rel="stylesheet" href="/css/javascript">
  <style>
    .trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <div class="mt-3 ml-3 d-flex">
        <i class="nav-icon far fa-user"></i> 
    </div>
    <div class="dropdown ml-2">
      <button class="btn btn-primary dropdown-toggle rounded" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
      </div>
    </div>
    <li class="nav-item">
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
  {{-- @extends('dashboard.layouts.navbar') --}}

  {{-- Sidebar --}}
  @extends('dashboard.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @if (Session::get('success'))
            <div class="alert alert-primary d-flex justify-content-center">{{ Session::get('success') }}</div>
        @endif

        @if (Session::get('deleted'))
            <div class="alert alert-danger d-flex justify-content-center">{{ Session::get('deleted') }}</div>
        @endif

        @yield('users')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ../../wrapper -->

{{-- Assets script js --}}
@extends('dashboard.layouts.script')
</body>
</html>
