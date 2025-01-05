<x-layout>
    <x-slot name="title">Dashboard</x-slot> 
    <x-slot name="breadcrumb_active">Dashboard</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>
    
    <div class="card-body">
    <div class="row">
      @auth
      @if(Auth::user()->role=='provider')
      <div class="col-md-3">
        <div class="info-box bg-primary">
          <div class="icon">
          <i class="fa-solid fa-users"></i>
          </div>
          <div class="details">
            <h3>{{ $totalReviews ?? 'null'}}</h3>
            <p>Total Reviews</p>
            <a href="{{ url('reviews/show') }}">More info</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info-box bg-success">
          <div class="icon">
          <i class="fa-solid fa-circle-stop"></i>
          </div>
          <div class="details">
            <h3>{{ $totalProvider ?? 'null'}}</h3>
            <p>Total Provider</p>
            <a href="{{ url('provider/show') }}">More info</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info-box bg-warning">
          <div class="icon">
          <i class="fa-solid fa-people-carry-box"></i>
          </div>
          <div class="details">
            <h3>{{ $totalOrders ?? 'null' }}</h3>
            <p>Total Orders</p>
            <a href="{{ url('orders/show') }}" style="color: black;">More info</a>
          </div>
        </div>
      </div>
    
      <div class="col-md-3">
        <div class="info-box bg-danger">
          <div class="icon">
          <i class="fa-solid fa-person-circle-check"></i>
          </div>
          <div class="details">
            <h3>{{  $ordersPending ?? 'null'}}</h3>
            <p>Orders Pending</p>
            <a href="{{ url('orders/show') }}">More info</a>
          </div>
        </div>
      </div>
      @endif
      @endauth

      @auth
      @if(Auth::user()->role=='customer')
      <div class="col-12 d-flex justify-content-center">
      <div class="col-md-3">
        <div class="info-box bg-primary">
          <div class="icon">
          <i class="fa-solid fa-users"></i>
          </div>
          <div class="details">
            <h3 style="visibility: hidden;">Transparent</h3>
            <p>Biodata Customer</p>
            <a href="{{ url('customerdata') }}">More Info</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info-box bg-success">
          <div class="icon">
          <i class="fa-solid fa-circle-stop"></i>
          </div>
          <div class="details">
            <h3>{{ $totalServices ?? 'null'}}</h3>
            <p>Total Services</p>
            <a href="{{ url('services/show') }}">More Info</a>
          </div>
        </div>
      </div>
    
      <div class="col-md-3">
        <div class="info-box bg-warning">
          <div class="icon">
          <i class="fa-solid fa-person-circle-check"></i>
          </div>
          <div class="details">
            <h3>{{  $userOrdersCount ?? 'null'}}</h3>
            <p>Your Orders</p>
            <a href="{{ url('customerorder') }}" class="text-dark">More Info</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="info-box bg-danger">
          <div class="icon">
          <i class="fa-solid fa-person-circle-check"></i>
          </div>
          <div class="details">
            <h3 style="visibility: hidden;">Transparent</h3>
            <a href="{{ url('orders/create') }}" class="text-white"><strong>ORDER NOW !</strong></a>
            <p style="visibility: hidden;">More Info</p>
          </div>
        </div>
      </div>

      
</div>
      @endif
      @endauth
     

    </div>
   

    </div>
    <div class="d-flex justify-content-between">
    <div class="card-body card-dashboard">
            @auth
            <fieldset>
              @if (Auth::check())
                <legend style="color: black; font-weight: bold;">Hi, {{ strtoupper(Auth::user()->name) ?? "" }}!</legend>
                    <article style="text-align: justify; color: black;">
                        <span style="font-size: 150%;">W</span>hether you're here to lend a helping hand or find the support you need, this platform is crafted to make every interaction seamless and meaningful. Together, let’s create a community where care and convenience meet. Let’s make today productive and inspiring—because every connection made here brightens someone’s day. Enjoy your journey with HelpMatch!
                    </article>
               @endif
            </fieldset>
            @endauth
        </div>

        <div class="card-body card-dashboard" id="current-time-card">
            <h4 class="pb-2" style="font-weight: bold; text-align: center;">

                <p class="btn btn-outline-info" style="font-weight: bold;">Current Time</p>
            </h4>
            <p id="current-time" style="font-size: 1.2em; color: black; font-weight: bold; text-align: center;"></p>
        </div>
    </div>

</x-layout>

<script>
    function updateTime() {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const now = new Date();
        document.getElementById('current-time').textContent = now.toLocaleString('en-US', options);
    }

    // Update time immediately and every second
    updateTime();
    setInterval(updateTime, 1000);
</script>