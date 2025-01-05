<x-layout>
    <x-slot name="title">Data Provider Services</x-slot> 
    <x-slot name="breadcrumb_active">Provider Services</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>

    <h2 class="text-center">Provider Services</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Schedule -->
        @auth
        @if(Auth::user()->role=='provider')
        <a href="{{ route('providers_services.create') }}">
            <button class="btn mb-1" style="background-color: #F47458; border-color: #F47458;">
                <i class="fa-solid fa-plus"></i> Create New
            </button>
        </a>
        @endif
        @endauth

        <!-- Form Search -->
        <form action="{{ route('providers_services.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search provider services" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Provider</th>
                <th>Services</th>
                <th>Price (IDR)</th>
                <th>Description</th>
                <th class="col-1">Action</th>     
            </tr>
        </thead>
        <tbody>
            @foreach($list_providers_services as $providers_services)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $providers_services->id }}</td>
                <td>
                    <span class="badge bg-info">{{ $providers_services->provider->user->name }}</span>
                </td>
                <td>
                    <span class="badge bg-warning">{{ $providers_services->services->name }}</span>
                </td>
                <td>
                    <span class="badge bg-secondary">{{ $providers_services->price }}</span>
                </td>
                <td>{{ $providers_services->description }}</td>
                <td>
                    <form action="{{ route('providers_services.destroy', $providers_services->id) }}" method="POST" class="d-inline">
                        <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadProvidersServices({{ $providers_services->id }})">
                            <i class="fas fa-eye" style="color: black;"></i>
                        </a>
                        @auth
                        @if(Auth::user()->role=='provider')
                        <a href="{{ route('providers_services.edit', $providers_services->id) }}" class="me-5 mx-2">
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
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Providers Services</h1>
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
    function loadProvidersServices(id) {
    const url = `/providers_services/${id}`;

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
            modalBody.innerHTML = `
                <table class="table table-striped table-sm">
                    <tr><th class="w-25">ID</th><td>: ${data.id}</td></tr>
                    <tr><th>Provider</th><td>: ${data.provider.user.name}</td></tr>
                    <tr><th>Services</th><td>: ${data.services.name}</td></tr>
                    <tr><th>Price</th><td>: ${data.price}</td></tr>
                    <tr><th>Description</th><td>: ${data.description}</td></tr>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<p>Error loading data.</p>';
        });
}
</script>