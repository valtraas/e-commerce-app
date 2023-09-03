<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\fitur;
use App\Models\harga;
use App\Models\laporan;
use App\Models\PortofolioModel;
use App\Models\proses;
use App\Models\roles;
use App\Models\Team;
use App\Models\ulasan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();
        proses::factory(4)->create();
        fitur::factory(4)->create();
        User::create([
            'name' => 'Test User',
            'username' => 'Algo',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'roles_id' => 1,
            'token' => Str::random(4)
        ]);

        Category::create(
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'desc' => 'Kami menawarkan jasa pembuatan website sesuai kebutuhan anda.'
            ]
        );
        Category::create(
            [
                'name' => 'Internet For Business',
                'slug' => 'internet-for-business',
                'desc' => 'Kami menyediakan layanan internet untuk bisnis dengan keamanan yang terjamin. perluas bisnis anda bersama kami'
            ]
        );
        Category::create(
            [
                'name' => 'UI / UX Desaign',
                'slug' => 'desaign',
                'desc' => 'Kami menawarkan jasa UI / UX yang menarik untuk membantu anda menciptakan pengalaman pengguna yang luar biasa'
            ]
        );
        roles::create(
            [
                'name' => 'Admin'
            ]
        );

        Team::create(
            [
                'name' => 'Neptune'
            ]
        );
    }
}
