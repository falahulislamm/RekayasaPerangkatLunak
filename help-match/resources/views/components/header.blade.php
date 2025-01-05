<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('halaman_utama') }}" class="nav-link">Home</a>
      </li>
      
      @auth
      @if(Auth::user()->role=='provider')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('customer/show') }}" class="nav-link">Customer</a>
      </li>
      @endif
      @endauth

      @auth
      @if(Auth::user()->role=='customer')      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('customerdata') }}" class="nav-link">Customer Info</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('customerorder') }}" class="nav-link">Orders</a>
      </li>
      @endif
      @endauth

      @auth
      @if(Auth::user()->role=='provider')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('orders/show') }}" class="nav-link">Orders</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('profit-chart') }}" class="nav-link">Revenue Chart</a>
      </li>
      @endif
      @endauth
      
    </ul>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    
@auth
@if (Auth::check())
<li class="mr-3">
  <div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{ ucfirst(strtolower(Auth::user()->name)) ?? "" }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</li>
@endif
@endauth
</ul>
</nav>