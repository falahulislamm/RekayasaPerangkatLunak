<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ProvidersServices;
use App\Models\Provider;
use App\Models\Services;
use App\Models\User;

class ProvidersServicesController extends Controller
{
    public function show(){
        $list_providers_services = ProvidersServices::all();
        return view('providers_services.show', ['list_providers_services'=>$list_providers_services]);
    }


    public function create()
    {
        
        $list_provider = Provider::all();
        $list_services = Services::all();
        $providers_services = new ProvidersServices();
        return view('providers_services.form',['list_services'=>$list_services,'list_provider'=>$list_provider, 'providers_services'=>$providers_services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'provider_id' => 'required',
            'service_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if($request->id){  
            ProvidersServices::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('providers_services.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            // Create a new produk instance with the validated data
            ProvidersServices::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('providers_services.show'))->with('pesan', 'Data berhasil disimpan');
        }  
    }

    public function edit($id)
    {
        $providers_services = ProvidersServices::find($id);
        $list_provider = Provider::all();
        $list_services = Services::all();
        return view('providers_services.form',['list_services'=>$list_services,'providers_services'=>$providers_services,'list_provider'=>$list_provider]);
    }

    public function view($id)
    {
        $providers_services = ProvidersServices::with('provider.user', 'services')->find($id);

        if (!$providers_services) {
            return response()->json(['error' => 'providers services not found'], 404);
        }

        return response()->json($providers_services);
    }


    public function destroy($id): RedirectResponse
    {
        ProvidersServices::find($id)->delete();
        return redirect(route('providers_services.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_providers_services = ProvidersServices::with('provider.user', 'services')
        ->where(function ($query) use ($search) {
            $query->whereHas('provider.user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('services', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");
        })
        ->get();

        return view('providers_services.show', compact('list_providers_services'));
    }
}
