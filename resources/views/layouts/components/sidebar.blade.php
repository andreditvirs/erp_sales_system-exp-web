<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        @if(\Auth::user()->role == 'admin')
          {{-- <li><a class="nav-link" href="{{ route('vendor.index') }}"><i class="far fa-square"></i> <span>Vendor</span></a></li> --}}
          {{-- <li><a class="nav-link" href="{{ route('sales.index') }}"><i class="far fa-square"></i> <span>Sales</span></a></li> --}}
          {{-- <li><a class="nav-link" href=""><i class="far fa-square"></i> <span>Purchase</span></a></li> --}}
          <li><a class="nav-link" href="{{ route('product.index') }}"><i class="far fa-square"></i> <span>Produk</span></a></li>
          <li><a class="nav-link" href="{{ route('customer.index') }}"><i class="far fa-square"></i> <span>Customer</span></a></li>
          <li><a class="nav-link" href="{{ route('invoice.index') }}"><i class="far fa-square"></i> <span>Invoice Penjualan</span></a></li>
        @endif
      </ul>
    </aside>
  </div>