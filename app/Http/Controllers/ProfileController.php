<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard.profile.index', [
            'title' => 'Profile | ' . $user->name,
            'layananList' => Category::all(),
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            'title' => 'Edit Profile | ' . $user->name,
            'layananList' => Category::all(),
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {

            $validateData = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'image' => 'nullable|file|image|max:3000'
            ]);
            // dd($validateData);
            notify()->success('Berhasil mengubah profile ' . $user->name);
            if ($request->file('image')) {
                if ($user->image) {
                    Storage::delete($user->image);
                }
                $validateData['image'] = $request->file('image')->store('profile-images');
            }
            $user->update($validateData);
            return redirect()->route('profile.index', ['user' => $user->username]);
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
        }
    }
}
