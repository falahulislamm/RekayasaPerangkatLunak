<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    public function show(){
        $list_customer = Customer::all();
        return view('customer.show',['list_customer'=>$list_customer]);
    }

    public function showCustomerData()
    {
        // Ambil data member yang memiliki user_id yang sesuai dengan yang sedang login
        $list_customer = Customer::where('user_id', Auth::id())->get();

        // Kirim data customer ke view
        return view('customer.show', compact('list_customer'));
    }

    public function create()
    {
        $customer = new Customer();
        $list_users = User::all();
        return view('customer.form',['customer'=>$customer, 'list_users'=>$list_users]);
    }


    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customerData = $request->all();
        $customerData['user_id'] = Auth::id(); // Tambahkan ID pengguna yang sedang login

        if ($request->id) {
            Customer::find($request->id)->update($customerData);
            return redirect(route('customer.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            Customer::create($customerData);
            return redirect(route('halaman_utama'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $list_users = User::all();
        return view('customer.form',['customer'=>$customer, 'list_users'=>$list_users]);
    }

    public function view($id)
    {
        $customer = Customer::with('user')->find($id);

        if (!$customer) {
            return response()->json(['error' => 'customer not found'], 404);
        }

        return response()->json($customer);
    }


    public function destroy($id): RedirectResponse
    {
        Customer::find($id)->delete();
        return redirect(route('customer.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
            $list_customer = Customer::with('user')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%");
            })
            ->get();

        return view('customer.show', compact('list_customer'));
    }
}
