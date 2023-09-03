<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.team.index', [
            'title' => 'Dashboard | Team',
            'layananList' => Category::all(),
            'team' => Team::Team(request('search'))->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.team.create', [
            'title' => 'Dashboar | Team',
            'layananList' => Category::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'image' => 'image|file|max:2000|nullable'
        ]);
        if ($request->file('image')) {
            $validateData['image'] =  $request->file('image')->store('Team-images');
        }
        notify()->success('Berhasil menambah data');
        Team::create($validateData);
        return redirect()->route('teams.index');
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
    public function edit(Team $team)
    {
        return view('dashboard.team.edit', [
            'title' => 'Team | ' . $team->name,
            'layananList' => Category::all(),
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'image' => 'image|file|max:2000|nullable'
        ]);
        if ($request->file('image')) {
            if ($team->image) {
                Storage::delete($team->image);
            }
            $validateData['image'] = $request->file('image')->store('team-image');
        }
        notify()->success('Berhasil mengedit data');
        $team->update($validateData);
        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::delete($team->image);
        }
        $team->delete();
        notify()->success('Berhasil menghapus data');
        return back();
    }
}
