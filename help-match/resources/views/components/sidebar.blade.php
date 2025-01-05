<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center d-flex align-items-center justify-content-center" style="background-color: #87CEEB; height: 100px;">
        <img src="{{ asset('assets log/logo_helpmatch.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="max-height: 60px;">
        <span class="brand-text text-dark">Help Match</span>
    </a>
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-2 d-flex justify-content-center">
        <div class="info">
            <div class="info">
              <span class="text-primary">You Log In as: {{ ucfirst(Auth::user()->role) }}</span>
            </div>
        </div>
      </div>
     

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="{{ url('halaman_utama') }}" class="nav-link">
              <i class="fa-solid fa-house"></i>
                  <p>
                      Dashboard
                  </p>
              </a>
          </li>
          
         @auth
         @if(Auth::user()->role=='provider')
          <li class="nav-item">
              <a href="{{ url('customer/show') }}" class="nav-link">
              <i class="fa-solid fa-address-card"></i>
                  <p>
                       Data Customer
                  </p>
              </a>
          </li>
          @endif
          @endauth
          
         @auth
         @if(Auth::user()->role=='customer')
          <li class="nav-item">
              <a href="{{ url('customerdata') }}" class="nav-link">
              <i class="fa-solid fa-address-card"></i>
                  <p>
                      Customer Info
                  </p>
              </a>
          </li>
          @endif
          @endauth
          
          <li class="nav-item">
              <a href="{{ url('provider/show') }}" class="nav-link">
              <i class="fa-solid fa-users-gear"></i>
                  <p>
                      Data Provider
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('services/show') }}" class="nav-link">
              <i class="fa-solid fa-toolbox"></i>
                  <p>
                      Data Services
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('providers_services/show') }}" class="nav-link">
              <i class="fa-solid fa-hand-holding-heart"></i>
                  <p>
                      Data Provider Services
                  </p>
              </a>
          </li>

        @auth
         @if(Auth::user()->role=='provider')
          <li class="nav-item">
              <a href="{{ url('orders/show') }}" class="nav-link">
              <i class="fa-solid fa-truck-fast"></i>
                  <p>
                      Data Orders
                  </p>
              </a>
          </li>
          @endif
          @endauth

          @auth
         @if(Auth::user()->role=='customer')
          <li class="nav-item">
              <a href="{{ url('customerorder') }}" class="nav-link">
              <i class="fa-solid fa-truck-fast"></i>
                  <p>
                      Data Orders
                  </p>
              </a>
          </li>
          @endif
          @endauth

          @auth
         @if(Auth::user()->role=='provider')
          <li class="nav-item">
              <a href="{{ url('payments/show') }}" class="nav-link">
              <i class="fa-solid fa-money-bill-1-wave"></i>
                  <p>
                      Data Payments
                  </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ url('reviews/show') }}" class="nav-link">
              <i class="fa-solid fa-comment"></i>
                  <p>
                      Data Reviews
                  </p>
              </a>
          </li>
          @endif
          @endauth
          
         @auth
         @if(Auth::user()->role=='provider')
          <li class="nav-item">
              <a href="{{ url('profit-chart') }}" class="nav-link">
              <i class="fa-solid fa-chart-simple"></i>
                  <p>
                      Revenue Chart
                  </p>
              </a>
          </li>
          @endif
          @endauth
          
          <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa-solid fa-right-from-bracket"></i>
                  <p> Logout </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              </form>
          </li>
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>