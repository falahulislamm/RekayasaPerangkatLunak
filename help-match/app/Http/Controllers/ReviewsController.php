<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Reviews;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\User;

class ReviewsController extends Controller
{
    public function show(){
        $list_reviews = Reviews::all(); 
        return view('reviews.show', ['list_reviews'=>$list_reviews]);
    }


    public function create()
    {
        $list_orders = Orders::with('customer')->get();
        $list_users = User::all();
        $reviews = new Reviews();
        return view('reviews.form',['list_orders'=>$list_orders, 'list_users'=>$list_users, 'reviews'=>$reviews]);
    }

    public function createWithOrder($order_id)
    {
        $order = Orders::with('customer')->find($order_id);
        $reviews = new Reviews();

        if (!$order) {
            return redirect()->route('orders.show')->with('error', 'Order not found');
        }

        return view('reviews.form', [
            'reviews' => $reviews,
            'order' => $order,
            'list_users' => User::all()
        ]);
    }


    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:255',
    ]);

    $existingReview = Reviews::where('order_id', $request->order_id)->where('user_id', Auth::id())->first();

    if ($existingReview) {
        return redirect()->route('orders.showcustomer')->with('error', 'You have already reviewed this order.');
    }

    $reviewsData = $request->all();
    $reviewsData['user_id'] = Auth::id();

    Reviews::create($reviewsData);

    return redirect()->route('halaman_utama')->with('pesan', 'Review successfully submitted.');
}


    public function edit($id)
    {
        $reviews = Reviews::find($id);
        $list_orders = Orders::with('customer')->get();
        $list_users = User::all();
        return view('reviews.form',['reviews'=>$reviews, 'list_orders'=>$list_orders, 'list_users'=>$list_users]);
    }

    public function view($id)
    {
        $reviews = Reviews::with( 'user')->find($id);

        if (!$reviews) {
            return response()->json(['error' => 'reviews not found'], 404);
        }

        return response()->json($reviews);
    }

    public function destroy($id): RedirectResponse
    {
        Reviews::find($id)->delete();
        return redirect(route('reviews.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_reviews = Reviews::with('orders.customer')
        ->where(function ($query) use ($search) {
            $query->whereHas('orders.customer', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhere('amount', 'like', "%$search%")
            ->orWhere('payment_date', 'like', "%$search%")
            ->orWhere('status', 'like', "%$search%");
        })
        ->get();

        return view('reviews.show', compact('list_reviews'));
    }
}
