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
        // dd($validated, $profile);
        // dd($request->file('image'),$validated['image']);
        $image = $validated['image'];
        // dd($validated);
        // $validated['password'] = bcrypt($validated['password']);

        $image_name = time().'_'.$image->getClientOriginalName();
        // $image = Image::make($image)->resize(320, 240);
        // dd($image, $image_name);
        $image_path = $image->storeAs('uploads',$image_name,'public');
        $validated['image'] = $image_path;
        $profile->update($validated);
        // $profile->image = $image_path;
        // dd($profile->password);
        // $profile->save();
        // dd($profile);
// dd('hello');
        // $profile_image = $request->file('image');/*dd($request->validated(),$request,$request->file('image'));*/
        // $profile_image_name = time().'_'.$profile_image->getClientOriginalName();
        // // dd($profile_image, $profile_image_name);
        // $file_path = $profile_image->storeAs('uploads', $profile_image_name, 'public');
        // // dd($file_path);
        // $profile->image = $file_path;
        // $profile->save();
        // // dd($profile->image);
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

