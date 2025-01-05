<x-layout>
<x-slot name="title">Manage Provider</x-slot> 
<x-slot name="breadcrumb_active">Provider</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>
<form action="{{ route('provider.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $provider->email }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone" value="{{ $provider->phone }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ $provider->address }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $provider->description }}" class="form-control" required>
    </div>
    
    <input type="hidden" name="id" value="{{ $provider->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('provider.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>