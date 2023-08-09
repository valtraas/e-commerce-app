<?php

use App\Http\Controllers\DashboardClient;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLayanan;
use App\Http\Controllers\DashboardPortofolio;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Category;
use App\Models\PortofolioModel;
use App\Models\Team;
use App\Models\ulasan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {

    return view('landing.index', [
        'title' => 'Teknorithm | Home',
        'layanan' => Category::all(),
        'portofolio' => PortofolioModel::with('category')->take(4)->get(),
        'ulasan' => ulasan::with('kontak')->latest()->get(),
    ]);
})->name('home');

Route::controller(PortofolioController::class)->group(function () {
    Route::get('/portofolio/all', 'index')->name('portofolio.index');
    Route::get('/portofolio/{category:slug}', 'category')->name('portofolio.detail');
});

Route::get('/layanan/{category:slug}', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/tentang-kami', function () {
    return view('tentang.index', [
        'title' => 'Teknorithm | Tentang',
        'layanan' => Category::all(),
        'team' => Team::all()
    ]);
})->name('about.index');

Route::controller(KontakController::class)->group(function () {
    Route::post('/kontak', 'index')->name('kontak.index');
    Route::post('/kontak/message', 'message')->name('kontak.message');
    Route::get('/kontak', 'view')->name('kontak.view');
});


Route::controller(LoginController::class)->group(function () {
    Route::get('/login/{token}', 'index')->name('login')->middleware('token.auth');
    Route::post('/login/{token}',  'auth')->name('login')->middleware('token.auth');
    Route::post('/logout',  'logout')->name('logout');
});

Route::middleware('admin', 'auth')->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::prefix('/portofolio')->controller(DashboardPortofolio::class)->group(function () {
            Route::get('{portofolio}', 'index')->name('portofolio.index');
            // create
            Route::get('{portofolio}/create', 'create')->name('portofolio.create');
            Route::post('{portofolio}', 'store')->name('portofolio.store');
            // update
            Route::get('{portofolio}/edit', 'edit')->name('portofolio.edit');
            Route::put('{portofolio}', 'update')->name('portofolio.update');
            // delete
            Route::delete('{portofolio}', 'destroy')->name('portofolio.delete');
        });

        Route::controller(DashboardLayanan::class)->group(function () {

            Route::get('layanan/{category:slug}/detail', 'detail')->name('detail.index');
            // Fitur Layanan
            Route::prefix('/layanan-fitur')->group(function () {
                Route::get('{category:slug}/create', 'created')->name('fitur.created');
                Route::post('{category:slug}/tambah', 'tambah')->name('fitur.tambah');
                Route::get('{fitur:name}/edit', 'edite')->name('fitur.edite');
                Route::put('{fitur:name}/ubah',  'ubah')->name('fitur.ubah');
                Route::delete('{fitur:name}',  'hapus')->name('fitur.hapus');
            });

            //  Proses Layanan
            Route::prefix('/layanan-proses')->group(function () {

                Route::get('{category:slug}/creates', 'creates')->name('proses.creates');
                Route::post('{category:slug}/add', 'add')->name('proses.add');
                Route::get('{proses:name}/edit', 'edited')->name('proses.edited');
                Route::put('{proses:name}/change', 'change')->name('proses.change');
                Route::delete('{proses:name}', 'deleted')->name('proses.deleted');
            });

            // Harga Layanan


            Route::get('layanan/slug', 'slug');
        });
        Route::resource('layanan', DashboardLayanan::class)->except('show');
        Route::resource('teams', TeamController::class)->except('show');
    });

    Route::prefix('/dashboard/client')->controller(DashboardClient::class)->group(function () {
        Route::get('', 'index')->name('client.index');
        Route::get('{kontak:name}/show', 'show')->name('client.show');
        Route::put('{kontak:name}/done', 'done')->name('client.done');
        Route::delete('{kontak:name}/eject', 'eject')->name('client.eject');
        Route::prefix('ulasan')->group(function () {
            Route::get('create', 'ulasanCreate')->name('ulasan.create');
            Route::post('store', 'ulasanStore')->name('ulasan.store');
            Route::get('{ulasan}/edit', 'ulasanEdit')->name('ulasan.edit')->where('ulasan', '[a-zA-Z\s]+');
            Route::put('{ulasan}/update', 'ulasanUpdate')->name('ulasan.update')->where('ulasan', '[a-zA-Z\s]+');
            Route::delete('{ulasan}/delete', 'ulasanDelete')->name('ulasan.delete')->where('ulasan', '[a-zA-Z\s]+');
        });
    });

    Route::prefix('/profil/{user:username}')->controller(ProfileController::class)->group(function () {
        Route::get('', 'index')->name('profile.index');
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::put('/update', 'update')->name('profile.update');
    });
});
