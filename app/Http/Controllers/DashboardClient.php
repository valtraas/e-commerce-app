<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\kontak;
use App\Models\ulasan;
use Illuminate\Http\Request;

class DashboardClient extends Controller
{
    public function index()
    {
        $search = request('search');
        $clients = Kontak::Client($search)->latest()->get();
        $comments = Ulasan::with('kontak')->Comment($search)->get();

        return view(
            'dashboard.client.index',
            [
                'title' => 'Dashboard | Client',
                'layananList' => Category::all(),
                'client' => $clients,
                'ulasan' => $comments

            ]
        );
    }

    public function show(kontak $kontak)
    {
        return view('dashboard.client.show', [
            'title' => 'Client | Detail',
            'layananList' => Category::all(),
            'client' => $kontak
        ]);
    }

    public function done(Request $request, kontak $kontak)
    {

        if ($request->has('status')) {
            $validateData['status'] = 'Terselesaikan';
        }
        notify()->success('Berhasil menyelesaikan project');
        $kontak->update($validateData);
        return redirect()->route('client.index');
    }

    public function eject(kontak $kontak)
    {
        $kontak->delete();
        notify()->success('Berhasil menghapus permintaan project');
        return back();
    }

    public function ulasanCreate()
    {
        return view('dashboard.client.ulasan.create', [
            'title' => 'Dashboard | Client',
            'client' => kontak::all(),
            'layananList' => Category::all()
        ]);
    }

    public function ulasanStore(Request $request)
    {
        $validateData = $request->validate([
            'kontak_id' => 'required',
            'ulasan' => 'required'
        ]);
        // dd($validateData);
        notify()->success('Berhasil menambah ulasan client');
        ulasan::create($validateData);
        return redirect()->route('client.index');
    }

    public function ulasanEdit($ulasan)
    {
        // dd($kontak);
        $data = ulasan::whereHas('kontak', function ($query) use ($ulasan) {
            $query->where('name', $ulasan);
        })->first();
        // dd($data); 

        return view('dashboard.client.ulasan.edit', [
            'title' => 'Dashboard | Client',
            'layananList' => Category::all(),
            'kontak' => $ulasan,
            'ulasan' => $data,
            'client' => kontak::all()
        ]);
    }

    public function ulasanUpdate(Request $request, $ulasan)
    {
        $data = Ulasan::whereHas('kontak', function ($query) use ($ulasan) {
            $query->where('name', $ulasan);
        })->first();

        $validateData = $request->validate([
            'kontak_id' => 'required',
            'ulasan' => 'required'
        ]);
        // dd($validateData);
        notify()->success('Berhasil mengubah data ulasan client');
        $data->update($validateData);
        return redirect()->route('client.index');
    }

    public function ulasanDelete($ulasan)
    {
        $data = ulasan::whereHas('kontak', function ($query) use ($ulasan) {
            $query->where('name', $ulasan);
        })->first();
        $data->delete();
        notify()->success('Berhasil menghapus ulasan');
        return back();
    }
}
