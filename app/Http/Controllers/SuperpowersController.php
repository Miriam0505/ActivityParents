<?php

namespace App\Http\Controllers;

use App\Models\Superpowers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperpowersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superpowers = Superpowers::where('user_id', Auth::id())
        //dd($superpowers); //::where('id', Auth::id())
        ->where('active', 1)
        ->select('id', 'name', 'desciption')
        ->get();
        //dd($superpowers);

        return view('superpowers.index', compact('superpowers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superpowers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        
        Superpowers::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'active' => 1,
        ]);

        return redirect()->route('superpowers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $superpowers = Superpowers::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'desciption')
        ->firstOrfail();

        //dd($superpowers);
        return view('superpowers.show', compact('superpower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $superpowers = Superpowers::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'desciption')
        ->firstOrfail();

        //dd($superpowers);
        return view('superpowers.edit', compact('superpower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $superpowers = Superpowers::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'desciption')
        ->firstOrfail();

        $superpowers->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('superpowers.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $superpowers = Superpowers::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->firstOrfail();

        $superpowers->update([
            'active' => 0
        ]);

        return redirect()->route('superpowers.show', $id);
    }
}