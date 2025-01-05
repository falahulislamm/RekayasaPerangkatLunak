<x-layout>
    <x-slot name="title">Data Reviews</x-slot> 
    <x-slot name="breadcrumb_active">Reviews</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>

    <h2 class="text-center">Data Reviews</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Schedule -->
        <a href="{{ route('reviews.create') }}">
            <button class="btn mb-1" style="background-color: #F47458; border-color: #F47458;">
                <i class="fa-solid fa-plus"></i> Create New
            </button>
        </a>

        <!-- Form Search -->
        <form action="{{ route('reviews.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search reviews" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <table class="table table-striped text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Order ID</th> <!-- Tambahkan kolom Order ID -->
            <th>Customer</th> 
            <th>Rating</th>
            <th>Comment</th>
            <th>Review Date</th>
            <th class="col-2">Action</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($list_reviews as $reviews)
        <tr>
            <td>{{ $reviews->id }}</td>
            <td>{{ $reviews->order_id }}</td> <!-- Tambahkan data Order ID -->
            <td>
                <span class="badge bg-warning">{{ $reviews->user ? $reviews->user->name : 'User not found' }}</span>
            </td>
            <td>
                <span class="badge bg-primary">{{ $reviews->rating }}</span>
            </td>
            <td>{{ $reviews->comment }}</td>
            <td>
                <span class="badge bg-secondary">{{ $reviews->review_date }}</span>
            </td>
            <td>
                <form action="{{ route('reviews.destroy', $reviews->id) }}" method="POST" class="d-inline">
                    <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadReviews({{ $reviews->id }})">
                        <i class="fas fa-eye" style="color: black;"></i>
                    </a>
                    <a href="{{ route('reviews.edit', $reviews->id) }}" class="me-5 mx-2">
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
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Reviews</h1>
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
    function loadReviews(id) {
    const url = `/reviews/${id}`;

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
                    <tr><th>Order ID</th><td>: ${data.order_id}</td></tr> <!-- Tambahkan Order ID -->
                    <tr><th>Customer</th><td>: ${data.user.name}</td></tr>
                    <tr><th>Rating</th><td>: ${data.rating}</td></tr>
                    <tr><th>Comment</th><td>: ${data.comment}</td></tr>
                    <tr><th>Review Date</th><td>: ${formatDate(data.review_date)}</td></tr>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<p>Error loading data.</p>';
        });
}
</script>