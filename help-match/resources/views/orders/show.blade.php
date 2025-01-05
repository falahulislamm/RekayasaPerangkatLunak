<x-layout>
    <x-slot name="title">Data Orders</x-slot> 
    <x-slot name="breadcrumb_active">Orders</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>

    <h2 class="text-center">Data Orders</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Schedule -->
        <a href="{{ route('orders.create') }}">
            <button class="btn mb-1" style="background-color: #F47458; border-color: #F47458;">
                <i class="fa-solid fa-plus"></i> Create New
            </button>
        </a>

        <!-- Form Search -->
        <form action="{{ route('orders.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search orders" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th> 
                <th>Services</th>
                <th>Status</th>
                <th>Taken by</th>
                <th>Order Date</th>
                <th>Action</th>
                @auth
                @if(Auth::user()->role == 'provider')
                <th class="col-1"></th>
                @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($list_orders as $orders)
            <tr>
                <td>{{ $orders->id }}</td>
                <td>
                    <span class="badge bg-info">{{ $orders->user ? $orders->user->name : 'User not found' }}</span>
                </td>
                <td>
                    <span class="badge bg-warning">{{ $orders->providers_services?->services?->name }}</span>
                </td>
                <td>
                    <span class="badge bg-secondary">{{ strtoupper($orders->status) }}</span>
                </td>
                <td>
                    <span>{{ $orders->provider->user->name ?? 'Looking for provider...'}}</span>
                </td>
                <td>{{ $orders->order_date }}</td>
                <td>
        @auth
        @if(Auth::user()->role == 'provider')
            <form action="{{ route('orders.destroy', $orders->id) }}" method="POST" class="d-inline">
                <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadOrders({{ $orders->id }})">
                    <i class="fas fa-eye" style="color: black;"></i>
                </a>
                @csrf
                @method('DELETE')
                <button type="submit" class="me-5 mx-2" style="background: none; border: none; padding: 0;">
                    <i class="bi bi-trash text-danger"></i>
                </button>
            </form>
        @endif
    @endauth

    @auth
        @if(Auth::user()->role == 'customer')
            @if($orders->status == 'completed')
                <a href="{{ route('reviews.createWithOrder', $orders->id) }}" class="btn btn-success">Review Here</a>
            @else
                <button type="button" class="btn btn-success" disabled>Review Here</button>
            @endif
        @endif
    @endauth
</td>

        @auth
        @if(Auth::user()->role == 'provider')
                <td>
                    <a href="{{ route('orders.edit', $orders->id) }}" class="me-5 mx-2">
                        <button type="button" class="btn btn-success">Take it</button>
                    </a>
                </td>
        @endif
        @endauth
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Orders</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Loading...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</x-layout>

<!-- AJAX -->
<script>
    function loadOrders(id) {
    const url = `/orders/${id}`;

    const modalBody = document.querySelector('#viewModal .modal-body');
    modalBody.innerHTML = '<p>Loading...</p>';

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Fungsi untuk memformat tanggal ISO menjadi format yang diinginkan
        function formatDate(isoString) {
            const date = new Date(isoString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
            return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        }
            modalBody.innerHTML = `
                <table class="table table-striped table-sm">
                    <tr><th class="w-25">ID</th><td>: ${data.id}</td></tr>
                    <tr><th>Customer</th><td>: ${data.user.name}</td></tr>
                    <tr><th>Services</th><td>: ${data.providers_services?.services?.name}</td></tr>
                    <tr><th>Status</th><td>: ${data.status}</td></tr>
                    <tr><th>Taken by</th><td>: ${data.provider?.user?.name || "Looking for provider..."}</td></tr>
                    <tr><th>Order Date</th><td>${formatDate(data.order_date)}</td></tr>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<p>Error loading data.</p>';
        });
}
</script>