<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Pengelolaan Surat</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             @if (Auth::check())
             <li class="nav-item">
              <a href="/dashboard" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

        @if (Auth::user()->role == 'staff')
        <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Data User
                  <i class="fas fa-angle-right right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('staff.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Staff Tata Usaha</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Data Surat
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('klasifikasi.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Klasifikasi Surat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('letter.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Surat</p>
              </a>
            </li>
          </ul>
        </li>
        @endif

        @if (Auth::user()->role == 'guru')
          <li class="nav-item">
            <a href="{{ route('letter.index') }}" class="nav-link">
              <i class="far fa-envelope nav-icon"></i>
              <p>Data Surat Masuk</p>
            </a>
          </li>
        @endif

        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>