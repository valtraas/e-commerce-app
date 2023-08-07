<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Category $category)
    {
        // $data = $category->with('proses', 'fitur')->get();
        // $proses = $category->proses()->get();
        return view('layanan.index', [
            'title' => 'Teknorithm | ' . $category->name,
            'category' => $category,
            'layanan' => $category->all(),
            'proses' => $category->proses,
            'fitur' => $category->fitur,
        ]);
    }
}
