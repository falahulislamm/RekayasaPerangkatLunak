<x-layout>
<x-slot name="title">Manage Reviews</x-slot> 
<x-slot name="breadcrumb_active">Reviews</x-slot>
<x-slot name="card_footer">@HelpMatch</x-slot>

<form action="{{ route('reviews.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="order_id">Order</label>
        <input type="text" name="order_id" id="order_id" value="{{ $order->id ?? '' }}" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" min="1" max="5" name="rating" id="rating" value="{{ $reviews->rating }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control" required>{{ $reviews->comment }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('reviews.show') }}" class="btn btn-danger">Cancel</a>
</form>

</x-layout>