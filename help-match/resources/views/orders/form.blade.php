<x-layout>
<x-slot name="title">Manage Orders</x-slot> 
<x-slot name="breadcrumb_active">Orders</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>

@auth
@if(Auth::user()->role=='customer')
<form action="{{ route('orders.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="provider_service_id">Services</label>
        <div class="row container">
            <select name="provider_service_id" class="form-select form-select-lg">
                <option>--Select--</option>
                @foreach($list_providers_services as $providers_services)
                <option value="{{ $providers_services->id }}" {{ $orders->provider_service_id==$providers_services->id ? 'selected': ''}}>
                    {{ $providers_services->services->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $orders->id }}">
    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
    <a href="{{ route('orders.showcustomer') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
@endif
@endauth

@auth
@if(Auth::user()->role=='provider')
<form action="{{ route('orders.storeprovider') }}" method="post">

    @csrf
    <div class="form-group">
        <label for="provider_id">Provider</label>
        <div class="row container">
            <select name="provider_id" class="form-select form-select-lg">
                <option>--Select--</option>
                @foreach($list_provider as $provider)
                <option value="{{ $provider->id }}" {{ $orders->provider_id==$provider->id ? 'selected': ''}}>
                    {{ $provider->user->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="pending" {{ $orders->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="accepted" {{ $orders->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="completed" {{ $orders->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ $orders->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>
    <input type="hidden" name="id" value="{{ $orders->id }}">
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="{{ route('orders.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
@endif
@endauth
</x-layout>