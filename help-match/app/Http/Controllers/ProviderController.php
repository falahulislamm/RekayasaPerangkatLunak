<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Provider;
use App\Models\User;

class ProviderController extends Controller
{
    public function show(){
        $list_provider = Provider::all();
        return view('provider.show',['list_provider'=>$list_provider]);
    }

    public function create()
    {
        $provider = new Provider();
        $list_users = User::all();
        return view('provider.form',['provider'=>$provider, 'list_users'=>$list_users]);
    }


    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        $providerData = $request->all();
        $providerData['user_id'] = Auth::id(); // Tambahkan ID pengguna yang sedang login

        if ($request->id) {
            Provider::find($request->id)->update($providerData);
            return redirect(route('provider.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            Provider::create($providerData);
            return redirect(route('provider.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $provider = Provider::find($id);
        $list_users = User::all();
        return view('provider.form',['provider'=>$provider, 'list_users'=>$list_users]);
    }

    public function view($id)
    {
        $provider = Provider::with('user')->find($id);

        if (!$provider) {
            return response()->json(['error' => 'provider not found'], 404);
        }

        return response()->json($provider);
    }


    public function destroy($id): RedirectResponse
    {
        Provider::find($id)->delete();
        return redirect(route('provider.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
            $search = $request->input('search');
            $list_provider = Provider::with('user')
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
            })
            ->get();

        return view('provider.show', compact('list_provider'));
    }
}
