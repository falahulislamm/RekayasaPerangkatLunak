<x-layout>
    <x-slot name="title">Data Payments</x-slot> 
    <x-slot name="breadcrumb_active">Payments</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>

    <h2 class="text-center">Data Payments</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Schedule -->
        <a href="{{ route('payments.create') }}">
            <button class="btn mb-1" style="background-color: #F47458; border-color: #F47458;">
                <i class="fa-solid fa-plus"></i> Create New
            </button>
        </a>

        <!-- Form Search -->
        <form action="{{ route('payments.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search payments" value="{{ request('search') }}">
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
                <th>Payment Type</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($list_payments as $payments)
            <tr>
                <td>{{ $payments->id }}</td>
                <td>
                    <span class="badge bg-warning">{{ $payments->user ? $payments->user->name : 'User not found' }}</span>
                </td>
                <td>{{ $payments->payment_type }}</td>
                <td>
                    <span class="badge bg-primary">{{ $payments->amount }}</span>
                </td>
                <td>{{ $payments->payment_date }}</td>
                <td>
                    <span class="badge bg-secondary">{{ $payments->status }}</span>
                </td>
                <td>
                    <form action="{{ route('payments.destroy', $payments->id) }}" method="POST" class="d-inline">
                        <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadPayments({{ $payments->id }})">
                            <i class="fas fa-eye" style="color: black;"></i>
                        </a>
                        <a href="{{ route('payments.edit', $payments->id) }}" class="me-5 mx-2">
                            <i class="bi bi-pencil-square" style="color: purple;"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="me-5 mx-2" style="background: none; border: none; padding: 0;">
                            <i class="bi bi-trash text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Payments</h1>
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
    function loadPayments(id) {
    const url = `/payments/${id}`;

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
                    <tr><th>Customer Order</th><td>: ${data.user.name}</td></tr>
                    <tr><th>Payment Type</th><td>: ${data.payment_type}</td></tr>
                    <tr><th>Amount</th><td>: ${data.amount}</td></tr>
                    <tr><th>Status</th><td>: ${data.status}</td></tr>
                    <tr><th>Payment Date</th><td>${formatDate(data.payment_date)}</td></tr>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<p>Error loading data.</p>';
        });
}
</script>