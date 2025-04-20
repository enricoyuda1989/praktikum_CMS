<nav 
  class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <div class="logo-header" data-background-color="dark">
      <a href="{{ url('/') }}" class="logo">
        <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20">
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
  </div>

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item">
          <a href="{{ url('/') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('products.index') }}">
            <i class="fas fa-box"></i>
            <p>Barang</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('products.index') }}">
            <i class="fas fa-luggage-cart"></i>
            <p>Transaksi Masuk</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('products.index') }}">
            <i class="fas fa-luggage-cart"></i>
            <p>Transaksi Keluar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('products.index') }}">
            <i class="fas fa-file-invoice-dollar"></i>
            <p>Laporan</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
