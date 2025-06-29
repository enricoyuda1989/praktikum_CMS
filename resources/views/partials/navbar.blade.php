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
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('products.index') }}">
            <i class="fas fa-box"></i>
            <p>Barang</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categories.index') }}">
            <i class="fas fa-tags"></i>
            <p>Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('suppliers.index') }}">
            <i class="fas fa-truck"></i>
            <p>Supplier</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('transactions.index') }}">
            <i class="fas fa-exchange-alt"></i>
            <p>Transaksi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('reports.index') }}">
            <i class="fas fa-file-alt"></i>
            <p>Laporan</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
