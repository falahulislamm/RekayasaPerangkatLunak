<x-layout>
<x-slot name="title">Manage Services</x-slot> 
<x-slot name="breadcrumb_active">Services</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>
<form action="{{ route('services.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Services</label>
        <input type="text" name="name" id="name" value="{{ $services->name }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $services->description }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price_range">Price Range</label>
        <input type="text" name="price_range" id="price_range" value="{{ $services->price_range }}" class="form-control" required>
    </div>
    
    <input type="hidden" name="id" value="{{ $services->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('services.show') }}" class="btn btn-danger mr-2">Cancel</a>
</form>
</x-layout>