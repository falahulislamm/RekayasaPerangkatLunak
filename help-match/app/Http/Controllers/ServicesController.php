<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\Services;

class ServicesController extends Controller
{
    public function show(){
        $list_services = Services::all();
        return view('services.show',['list_services'=>$list_services]);
    }

    public function create()
    {
        $services = new Services();
        return view('services.form',['services'=>$services]);
    }


    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_range' => 'required',
        ]);

        if($request->id){  
            Services::find($request->id)->update($request->all());
            // Redirect to the index page with a success message
            return redirect(route('services.show'))->with('pesan', 'Data berhasil diupdate');
        }
        else{
            Services::create($request->all());
            // Redirect to the index page with a success message
            return redirect(route('services.show'))->with('pesan', 'Data berhasil disimpan');
        }  
    }

    public function edit($id)
    {
        $services = Services::find($id);
        return view('services.form',['services'=>$services]);
    }

    public function view($id)
    {
        $services = Services::find($id);

        if (!$services) {
            return response()->json(['error' => 'services not found'], 404);
        }

        return response()->json($services);
    }


    public function destroy($id): RedirectResponse
    {
        Services::find($id)->delete();
        return redirect(route('services.show'))->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_services = \App\Models\Services::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('price_range', 'like', "%$search%");
            })
            ->get();

        return view('services.show', compact('list_services'));
    }
}
