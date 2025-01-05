<x-layout>
<x-slot name="title">Manage Provider Services</x-slot> 
<x-slot name="breadcrumb_active">Provider Services</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>
<form action="{{ route('providers_services.store') }}" method="post">
    @csrf
    
    <div class="form-group">
        <label for="provider_id">Provider</label>
        <div class="row container">
        <select name="provider_id" class="form-select form-select-lg">
            <option>--Select--</option>
            @foreach($list_provider as $provider)
            <option value="{{ $provider->id }}" {{ $providers_services->provider_id==$provider->id ? 'selected': ''}}>
                {{ $provider->user->name }}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group">
        <label for="service_id">Services</label>
        <div class="row container">
        <select name="service_id" class="form-select form-select-lg">
            <option>--Select--</option>
            @foreach($list_services as $services)
            <option value="{{ $services->id }}" {{ $providers_services->service_id==$services->id ? 'selected': ''}}>
                {{ $services->name }}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-2">
                <label for="price">Price</label>
                <input type="number" step="0.01" max="99999999.99" name="price" id="price" value="{{ $providers_services->price }}" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-2">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ $providers_services->description }}" class="form-control" required>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $providers_services->id }}">
    <div class="pt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('providers_services.show') }}" class="btn btn-danger mr-2">Cancel</a>
    </div>
</form>
</x-layout>