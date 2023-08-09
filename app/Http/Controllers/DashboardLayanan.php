<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\fitur;
use App\Models\proses;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardLayanan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.layanan.index', [
            'layananList' => category::Layanan(request(['search']))->latest()->get(),
            'title' => 'Dashboard | Layanan',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layanan.create', [
            'title' => 'Dashboard | Layanan',
            'layananList' => Category::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'slug' => 'required|unique:category',
            'desc' => 'required|max:225',
            'image' => 'image|file|nullable|max:5000'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('layanan-images');
        }
        notify()->success('Berhasil menambah layanan');
        Category::create($validatedData);
        return redirect('/dashboard/layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $layanan)
    {
        return view('dashboard.layanan.edit', [
            'title' => 'Layanan | ' . $layanan->name,
            'layanan' => $layanan,
            'layananList' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $layanan)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'slug' => 'required',
            'desc' => 'required|max:225',
            'image' => 'image|file|nullable|max:10000'
        ]);
        if ($request->file('image')) {
            if ($layanan->image) {
                Storage::delete($layanan->image);
            }
            $validatedData['image'] = $request->file('image')->store('layanan-images');
        }
        $layanan->update($validatedData);
        return redirect('/dashboard/layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $layanan)
    {
        $layanan->delete();
        if ($layanan->image) {
            Storage::delete($layanan->image);
        }
        return back();
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }



    public function detail(Category $category)
    {
        // dd(request('proses'));
        return view('dashboard.layanan.detail.detail', [
            'title' => 'Dashboard | ' . $category->name,
            'layananList' => Category::all(),
            'layanan' => $category,
            'proses' => proses::where('category_id', $category->id)->latest()->Steps(request('proses'))->get(),
            'fitur' => fitur::where('category_id', $category->id)->Found(request('fitur'))->latest()->get(),
        ]);
    }
    // proses layanan

    public function creates(Category $category)
    {
        return view('dashboard.layanan.detail.proses.create', [
            'title' => 'Dashboard | Proses Layanan',
            'layananList' => Category::all(),
            'layanan' => $category
        ]);
    }

    public function add(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);
        $validatedData['category_id'] = $category->id;
        notify()->success('Berhasil Menambahkan Proses Layanan');
        proses::create($validatedData);
        return redirect()->route('detail.index', ['category' => $category->slug]);
    }

    public function edited(Proses $proses)
    {
        $category = $proses->category;
        return view('dashboard.layanan.detail.proses.edit', [
            'title' => 'Dashboard | Proses Layanan',
            'layananList' => Category::all(),
            'proses' => $proses,
            'category' => $category,
        ]);
    }

    public function change(Request $request, Proses $proses)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'category_id' => 'required'
        ]);
        notify()->success('Data Berhasil Di ubah');
        $proses->update($validatedData);
        return redirect()->route('detail.index', ['category' => $proses->category->slug]);
    }

    public function deleted(proses $proses)
    {
        notify()->success('Data Berhasil di hapus');
        $proses->delete();
        return back();
    }

    // fitur Layanan

    public function created(Category $category)
    {
        return view('dashboard.layanan.fitur.create', [
            'title' => 'Dashboard | Fitur Layanan',
            'layananList' => Category::all(),
            'layanan' => $category
        ]);
    }

    public function tambah(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required|max:225',
            'icon' => 'image|file|max:2000|nullable'
        ]);
        $validatedData['category_id'] = $category->id;
        // dd($validatedData);
        if ($request->file('icon')) {
            $validatedData['icon'] = $request->file('icon')->store('fitur-icon');
        }
        notify()->success('Berhasil menambahkan fitur layanan');
        fitur::create($validatedData);
        return redirect()->route('detail.index', ['category' => $category->slug]);
    }

    // edite ubah

    public function edite(fitur $fitur)
    {
        $category = $fitur->category;
        return view('dashboard.layanan.fitur.edit', [
            'title' => 'Dashboard | Fitur Layanan',
            'layananList' => Category::all(),
            'fitur' => $fitur,
            'layanan' => $category
        ]);
    }

    public function ubah(Request $request, fitur $fitur)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required|max:225',
            'icon' => 'image|file|max:2000|nullable'
        ]);
        notify()->success('Berhasil merubah fitur layanan');
        $fitur->update($validatedData);
        return redirect()->route('detail.index', ['category' => $fitur->category->slug]);
    }

    public function hapus(fitur $fitur)
    {
        notify()->success('Berhasil menghapus fitur layanan');
        $fitur->delete();
        return back();
    }

    public function proses(Category $category)
    {
        return view('dashboard.layanan.detail.proses', [
            'title' => 'Dashboard | Detail ' . $category->name,
            'layananList' => Category::all(),
            'layanan' => $category,
            'proses' => proses::all()
        ]);
    }
}
