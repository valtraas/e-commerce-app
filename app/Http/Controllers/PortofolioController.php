<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortofolioModel;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        return view(
            'portofolio.index',
            [
                'title' => "Teknorithm | Portofolio",
                'layanan' => Category::all(),
                'portofolio' => PortofolioModel::with('category')->paginate(3)
            ]
        );
    }

    public function category(Category $category)
    {
        return view(
            'portofolio.category',
            [
                'title' => 'Teknorithm | ' . $category->name,
                'layanan' => Category::all(),
                'portofolio' => $category->portofolio()->paginate(3),
                'category' => $category->name
            ]
        );
    }
}
