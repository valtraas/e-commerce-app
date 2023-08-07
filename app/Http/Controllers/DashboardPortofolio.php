<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortofolioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPortofolio extends Controller
{
    public function index($portofolio)
    {
        try {
            $category = Category::where('slug', $portofolio)->first();

            $data = PortofolioModel::with('category')->where('category_id', $category->id)->Filter(request('search'))->latest()->get();

            return view('dashboard.portofolio.index', [
                'title' => 'Dashboard | ' . $category->name,
                'slug' => $category->slug,
                'layanan' => $category->name,
                'portofolio' => $data,
                'layananList' => Category::all()
            ]);
        } catch (\Exception) {
            abort(404);
        }
        // dd(request('search'));
    }

    public function create($portofolio)
    {
        $category = Category::where('slug', $portofolio)->first();

        return view('dashboard.portofolio.create', [
            'title' => 'Dashboard | ' . $category->name,
            'slug' => $category->slug,
            'layanan' => $category,
            'layananList' => Category::all()


        ]);
    }

    public function store(Request $request, $portofolio)
    {
        $validatedData = $request->validate([
            'judul' => 'required|unique:portofolio',
            'link' => 'url|max:255|unique:portofolio',
            'image' => 'image|file|max:10000|nullable',
            'category_id' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('portofolio-images');
        }
        $category = Category::where('slug', $portofolio)->first();
        $slug = $category->slug;


        PortofolioModel::create($validatedData);

        return redirect()->route('portofolio.index', ['portofolio' => $slug])->with('success', 'Data portofolio berhasil ditambahkan.');
    }


    public function edit($portofolio)
    {
        try {

            $data = PortofolioModel::with('category')->where('judul', $portofolio)->first();

            return view('dashboard.portofolio.edit', [
                'title' => 'Dashboard | ' . $portofolio,
                'slug' => $data->category->slug,
                'layananList' => Category::all(),
                'portofolio' => $data

            ]);
        } catch (\Exception) {
            abort(404);
        }
    }

    public function update(Request $request, $portofolio)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:225',
            'link' => 'url|max:225',
            'image' => 'image|file|max:10000|nullable',
            'category_id' => 'required'
        ]);
        $data = PortofolioModel::with('category')->where('judul', $portofolio)->first();
        $slug = $data->category->slug;
        if ($request->file('image')) {
            if ($data->image) {
                Storage::delete($data->image);
            }
            $validatedData['image'] = $request->file('image')->store('portofolio-images');
        }
        $data->update($validatedData);
        return redirect()->route('portofolio.index', ['portofolio' => $slug]);
    }

    public function destroy($portofolio)
    {
        $data = PortofolioModel::where('judul', $portofolio)->first();
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return back();
    }
}
