<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = Parents::where('user_id', Auth::id())
        ->where('active', 1)
        ->select('id', 'name', 'gender')
        ->get();

        return view('parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Parents::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->gender,
            'active' => 1,
        ]);

        return redirect()->route('parents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parents = Parents::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'gender')
        ->firstOrfail();

        return view('parents.show', compact('parents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parents = Parents::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'gender')
        ->firstOrfail();

        return view('parents.edit', compact('parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $parents = Parents::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'gender')
        ->firstOrfail();

        $parents->update([
            'name' => $request->name,
            'gender' => $request->gender
        ]);

        return redirect()->route('parents.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parents = Parents::where('user_id', Auth::id())
        ->where('id', $id)
        ->where('active', 1)
        ->select('id', 'name', 'gender')
        ->firstOrfail();

        $parents->update([
            'active' => 0
        ]);

        return redirect()->route('parents.show', $id);
    }
}
