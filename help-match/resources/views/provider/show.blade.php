<x-layout>
<x-slot name="title">Data Provider</x-slot> 
<x-slot name="breadcrumb_active">Provider</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>

<h2 class="text-center">Data Provider</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Trainer -->
        @auth
        @if(Auth::user()->role=='provider')
        <a href="{{ route('provider.create') }}">
            <button class="btn mb-1" style="background-color: #F47458; border-color: #F47458;">
                <i class="fa-solid fa-plus"></i> Create New Provider
            </button>
        </a>
       @endif
       @endauth

        <!-- Form Search -->
        <form action="{{ route('provider.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search provider" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
<table class="table table-bordered text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Provider</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Description</th>
            <th class="col-1">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list_provider as $provider)
        <tr>
            <td class="fw-bold">{{ $provider->id }}</td>
            <td>{{ $provider->user ? $provider->user->name : 'User not found' }}</td>
            <td>
                <span>{{ $provider->email }}</span>
            </td>
            <td>
                <span class="badge bg-primary">{{ $provider->phone }}</span>
            </td>
            <td>{{ $provider->address }}</td>
            <td>{{ $provider->description }}</td>
            <td>
                
                <form action="{{ route('provider.destroy', $provider->id) }}" method="POST" class="d-inline">
                    <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadprovider({{ $provider->id }})">
                        <i class="fas fa-eye" style="color: black;"></i>
                    </a>
                    @auth
                    @if(Auth::user()->role=='provider')
                    <a href="{{ route('provider.edit', $provider->id) }}" class="me-5 mx-2">
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
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Provider</h1>
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
    function loadprovider(id) {
    const url = `/provider/${id}`; // URL berdasarkan rute Anda

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
                    <tr><th>Provider</th><td>${data.user.name}</td></tr>
                    <tr><th>Email</th><td>${data.email}</td></tr>
                    <tr><th>Phone</th><td>${data.phone}</td></tr>
                    <tr><th>Address</th><td>${data.address}</td></tr>
                    <tr><th>Description</th><td>${data.description}</td></tr>
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