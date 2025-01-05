<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\Provider;
use App\Models\Payments;
use App\Models\ProvidersServices;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function show(){
        $list_orders = Orders::all();
        return view('orders.show', ['list_orders'=>$list_orders]);
    }

    public function showcustomer()
    {
        $list_orders = Orders::where('user_id', Auth::id())->get();

        // Kirim data ke view
        return view('orders.show', ['list_orders' => $list_orders]);
    }


    public function create()
    {
        $list_customer = Customer::all();
        $list_provider = Provider::all();
        $list_providers_services = ProvidersServices::with('services')->get();
        $list_users = User::all();
        $orders = new Orders();
        return view('orders.form',['list_customer'=>$list_customer, 'list_provider'=>$list_provider, 'list_providers_services'=>$list_providers_services, 'list_users'=>$list_users, 'orders'=>$orders]);
    }

    public function halaman_utama()
    {
        $totalReviews = DB::table('reviews')->count();
        $totalServices = DB::table('services')->count();
        $totalProvider = DB::table('provider')->count();
        $totalOrders = DB::table('orders')->count();
        $ordersPending = DB::table('orders')->where('status', 'pending')->count();
        $userOrdersCount = Orders::where('user_id', Auth::id())->count();
        
        
        return view('halaman_utama', [
            'totalReviews' => $totalReviews,
            'totalServices' => $totalServices,
            'totalProvider' => $totalProvider,
            'totalOrders' => $totalOrders,
            'ordersPending' => $ordersPending,
            'userOrdersCount' => $userOrdersCount,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
            // Validasi data inputan
            $request->validate([
                'provider_service_id' => 'required',
            ]);

        $bookingData = $request->all();
        $bookingData['user_id'] = Auth::id(); // Tambahkan ID pengguna yang sedang login

        if ($request->id) {
            Orders::find($request->id)->update($bookingData);
            return redirect(route('orders.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            Orders::create($bookingData);
            return redirect(route('payments.create'))->with('pesan', 'Data berhasil disimpan');
        }  
    }

    public function storeprovider(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'status' => 'required',
            'provider_id' => 'required',
        ]);

        if($request->id){  
            Orders::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('orders.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            Orders::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('orders.show'))->with('pesan', 'Data berhasil disimpan');
        }  
    }


    public function edit($id)
    {
        $orders = Orders::find($id);
        $list_customer = Customer::all();
        $list_provider = Provider::all();
        $list_providers_services = ProvidersServices::with('services')->get();
        $list_users = User::all();
        return view('orders.form',['orders'=>$orders, 'list_customer'=>$list_customer, 'list_provider'=>$list_provider, 'list_providers_services'=>$list_providers_services, 'list_users'=>$list_users]);
    }

    public function view($id)
    {
        $orders = Orders::with('user', 'providers_services.services', 'provider.user')->find($id);

        if (!$orders) {
            return response()->json(['error' => 'orders not found'], 404);
        }

        return response()->json($orders);
    }

    public function destroy($id): RedirectResponse
    {
        Orders::find($id)->delete();
        return redirect(route('orders.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_orders = Orders::with('user', 'providers_services.services')
        ->where(function ($query) use ($search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('providers_services.services', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhere('status', 'like', "%$search%")
            ->orWhere('order_date', 'like', "%$search%");
        })
        ->get();

        return view('orders.show', compact('list_orders'));
    }
}
