<x-layout>
    <x-slot name="title">Payments</x-slot>
    <x-slot name="breadcrumb_active">Payments</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>
    @auth
    @if(Auth::user()->role=='customer')
    <form action="{{ route('payments.store') }}" method="post" class="p-4 border rounded shadow-sm bg-light" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="payment_type">Payment Type</label>
        <select name="payment_type" id="payment_type" class="form-control" required>
            <option value="COD" {{ $payments->payment_type == 'COD' ? 'selected' : '' }}>COD (Cash on Delivery)</option>
            <option value="BCA" {{ $payments->payment_type == 'BCA' ? 'selected' : '' }}>BCA</option>
            <option value="DANA" {{ $payments->payment_type == 'DANA' ? 'selected' : '' }}>DANA</option>
            <option value="GOPAY" {{ $payments->payment_type == 'GOPAY' ? 'selected' : '' }}>GOPAY</option>
            <option value="SPAY" {{ $payments->payment_type == 'SPAY' ? 'selected' : '' }}>SPAY</option>
        </select>
    </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" max="99999999.99" name="amount" id="amount" 
                        value="{{ $payments->amount }}" 
                        class="form-control" placeholder="Enter amount" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    <label for="payment_date">Payment Date</label>
                    <input type="datetime-local" name="payment_date" id="payment_date" 
                        value="{{ $payments->payment_date }}" 
                        class="form-control" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $payments->id }}">
        <button type="submit" class="btn btn-primary">I Have Paid</button>
        <a href="{{ route('orders.create') }}" class="btn btn-danger mr-2">Cancel</a>
    </form>
    @endif
    @endauth

    @auth
    @if(Auth::user()->role=='provider')
    <form action="{{ route('payments.storeprovider') }}" method="post" class="p-4 border rounded shadow-sm bg-light">
        @csrf
        <div class="form-group">
        <label for="payment_type">Payment Type</label>
        <select name="payment_type" id="payment_type" class="form-control" required>
            <option value="BCA" {{ $payments->payment_type == 'BCA' ? 'selected' : '' }}>BCA</option>
            <option value="DANA" {{ $payments->payment_type == 'DANA' ? 'selected' : '' }}>DANA</option>
            <option value="GOPAY" {{ $payments->payment_type == 'GOPAY' ? 'selected' : '' }}>GOPAY</option>
            <option value="SPAY" {{ $payments->payment_type == 'SPAY' ? 'selected' : '' }}>SPAY</option>
        </select>
    </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" max="99999999.99" name="amount" id="amount" 
                        value="{{ $payments->amount }}" 
                        class="form-control" placeholder="Enter amount" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    <label for="payment_date">Payment Date</label>
                    <input type="datetime-local" name="payment_date" id="payment_date" 
                        value="{{ $payments->payment_date }}" 
                        class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $payments->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $payments->status == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="failed" {{ $payments->status == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>
        <input type="hidden" name="id" value="{{ $payments->id }}">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('payments.show') }}" class="btn btn-danger mr-2">Cancel</a>
    </form>
    @endif
    @endauth

    <!-- Payment Information -->
    <div class="mt-4 p-3 border rounded bg-info">
        <h5 class="text-dark text-center"><strong>Payment Information</strong></h5><hr style="border: 2px solid black;">
        <p class="mb-2">
            <strong>BCA:</strong> 71512012440 (Dori PDPL)
        </p>
        <p class="mb-0">
            <strong>DANA, GOPAY, SPAY:</strong> 085892226663 (Dori PDPL)
        </p>
    </div>

</x-layout>
