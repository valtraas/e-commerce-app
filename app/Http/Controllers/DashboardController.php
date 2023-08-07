<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\kontak;
use App\Models\PortofolioModel;
use App\Models\ulasan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Teknorithm | Dashboard',
            'category' => Category::all(),
            'layananList' => Category::all(),
            'portofolio' => PortofolioModel::all(),
            'client' => kontak::where('status', 'Terselesaikan')->get(),
            'ulasan' => ulasan::all()
        ]);
    }
}
