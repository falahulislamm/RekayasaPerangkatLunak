<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Payments;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PaymentsController extends Controller
{
    public function show(){
        $list_payments = Payments::all(); 
        return view('payments.show', ['list_payments'=>$list_payments]);
    }


    public function create()
    {
        $list_orders = Orders::with('customer')->get();
        $list_users = User::all();
        $payments = new Payments();
        return view('payments.form',['list_orders'=>$list_orders, 'list_users'=>$list_users, 'payments'=>$payments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'payment_type' => 'required',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $paymentsData = $request->all();
        $paymentsData['user_id'] = Auth::id(); // Tambahkan ID pengguna yang sedang login

        if ($request->id) {
            Payments::find($request->id)->update($paymentsData);
            return redirect(route('payments.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            Payments::create($paymentsData);
            return redirect(route('orders.showcustomer'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function storeprovider(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'payment_type' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
            'status' => 'required',
        ]);

        if($request->id){  
            Payments::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('payments.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            Payments::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('payments.show'))->with('pesan', 'Data berhasil disimpan');
        }  
    }

    public function edit($id)
    {
        $payments = Payments::find($id);
        $list_orders = Orders::with('customer')->get();
        return view('payments.form',['payments'=>$payments, 'list_orders'=>$list_orders]);
    }

    public function view($id)
    {
        $payments = Payments::with( 'user')->find($id);

        if (!$payments) {
            return response()->json(['error' => 'payments not found'], 404);
        }

        return response()->json($payments);
    }

    public function destroy($id): RedirectResponse
    {
        $payment = Payments::findOrFail($id);

        // Hapus file bukti pembayaran jika ada
        if ($payment->payment_proof) {
            Storage::disk('public')->delete($payment->payment_proof);
        }

        $payment->delete();
        return redirect(route('payments.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_payments = Payments::with('user')
        ->where(function ($query) use ($search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhere('amount', 'like', "%$search%")
            ->orWhere('payment_date', 'like', "%$search%")
            ->orWhere('status', 'like', "%$search%");
        })
        ->get();

        return view('payments.show', compact('list_payments'));
    }
}
