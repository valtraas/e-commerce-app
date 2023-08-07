<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function view()
    {
        return view('kontak.index', [
            'title' => 'Teknorithm | Kontak',
            'layanan' => Category::all()
        ]);
    }
    public function index(Request $request)
    {
        $harga = $request->input('harga');
        // dd($namaHarga);
        return view('kontak.index', [
            'title' => 'Teknorithm | Kontak',
            'layanan' => Category::all()
        ], compact('harga'));
    }

    public function message(Request $request)
    {
        $message = $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'telephone' => 'required | numeric',
                'pesan' => 'required',
                'harga_id' => 'nullable'
            ],
            [
                'name' => [
                    'required' => 'Mohon sertakan nama anda'
                ],
                'email' => [
                    'required' => 'Kami perlu mengetahui email anda',
                    'email' => 'Mohon masukan email anda dengan benar'
                ],
                'telephone' => [
                    'required' => 'Mohon masukan nomor telephone anda',
                    'numeric' => 'Mohon masukan nomor dengan benar'
                ],
                'pesan' => [
                    'required' => 'Mohon masukan pesan anda'
                ]
            ]
        );
        $message['status'] = 'Belum Terselesaikan';

        kontak::create($message);
        return redirect()->back();
    }
}
