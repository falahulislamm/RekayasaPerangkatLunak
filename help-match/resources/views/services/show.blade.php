<x-layout>
<x-slot name="title">Data Services</x-slot> 
<x-slot name="breadcrumb_active">Services</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>

<h2 class="text-center">Data Services</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Trainer -->
        @auth
        @if(Auth::user()->role=='provider')
        <a href="{{ route('services.create') }}">
            <button class="btn mb-1" style="background-color: #F47458; border-color: #F47458;">
                <i class="fa-solid fa-plus"></i> Create New Services
            </button>
        </a>
       @endif
       @endauth

        <!-- Form Search -->
        <form action="{{ route('services.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search services" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
<table class="table table-bordered text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Services</th>
            <th>Description</th>
            <th>Price Range (IDR)</th>
            <th class="col-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list_services as $services)
        <tr>
            <td class="fw-bold">{{ $services->id }}</td>
            <td>{{ $services->name }}</td>
            <td>
                <span>{{ $services->description }}</span>
            </td>
            <td>
                <span class="badge bg-primary">{{ $services->price_range }}</span>
            </td>
            <td>
                
                <form action="{{ route('services.destroy', $services->id) }}" method="POST" class="d-inline">
                    <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadServices({{ $services->id }})">
                        <i class="fas fa-eye" style="color: black;"></i>
                    </a>
                    @auth
                    @if(Auth::user()->role=='provider')
                    <a href="{{ route('services.edit', $services->id) }}" class="me-5 mx-2">
                        <i class="bi bi-pencil-square" style="color: purple;"></i>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="me-5 mx-2" style="background: none; border: none; padding: 0;">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                    @endif
                    @endauth
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
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Services</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Loading...</p> <!-- Isi akan diganti dengan data dari server -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</x-layout>

<script>
    function loadServices(id) {
    const url = `/services/${id}`; // URL berdasarkan rute Anda

    // Kosongkan modal sebelum data baru dimuat
    const modalBody = document.querySelector('#viewModal .modal-body');
    modalBody.innerHTML = '<p>Loading...</p>';

    // Ambil data trainer melalui AJAX
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

            // Isi modal dengan data dari server
            modalBody.innerHTML = `
                <table class="table table-striped table-sm">
                    <tr><th class="w-25">ID</th><td>${data.id}</td></tr>
                    <tr><th>Services</th><td>${data.name}</td></tr>
                    <tr><th>Description</th><td>${data.description}</td></tr>
                    <tr><th>Price Range</th><td>${data.price_range}</td></tr>
                    <tr><th>Created at</th><td>${formatDate(data.created_at)}</td></tr>
                    <tr><th>Updated at</th><td>${formatDate(data.updated_at)}</td></tr>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<p>Error loading data.</p>';
        });
}
</script>