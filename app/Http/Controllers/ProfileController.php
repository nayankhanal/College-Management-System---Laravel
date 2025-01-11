<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('components.profiles.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $profile)
    {
        if(auth()->user()->cannot('update', $profile)){
            abort(403);
        }
        return view('components.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, User $profile)
    {

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $validated['image'];

            $image_name = time().'_'.$image->getClientOriginalName();
    
            $image_path = $image->storeAs('uploads',$image_name,'public');
            $validated['image'] = $image_path;
        }

        $profile->update($validated);

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

