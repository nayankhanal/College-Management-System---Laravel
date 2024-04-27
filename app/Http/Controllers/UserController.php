<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('components.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $validated = $request->validated();
            // dd($request->file('image'),$validated['image']);
            $image = $validated['image'];
            // $validated['password'] = bcrypt($validated['password']);
            $password = Str::random(8);
            $validated['password']=bcrypt($password);

            $image_name = time().'_'.$image->getClientOriginalName();
            // $image = Image::make($image)->resize(320, 240);
            // dd($image, $image_name);
            // $image_path = $image->save(public_path('uploads/'.$image_name));
            // dd($image_path);
            $image_path = $image->storeAs('uploads',$image_name);
            // $validated['image'] = $image_path;
            $user_email = $validated['email'];
            // dd($image, $image_name, $user_email);
            User::create($validated);

            Mail::send('mail',['user'=>$validated['name'], 'password'=>$password], function ($message) use($user_email) {
                $message->to($user_email)->subject('Welcome to CMS');
            });

            // dd("Mail sent");

            return redirect()->route('users.index')->with('success','User created successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            // dd($e->getMessage());
            return redirect()->route('users.create')->with('error','Something went wrong during user creation!' .$e->getMessage());
        }
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
    public function edit(User $user)
    {
        return view('components.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {

            $validated = $request->validated();
            // dd($request->file('image'),$validated['image']);
            $image = $validated['image'];
            // $validated['password'] = bcrypt($validated['password']);
            $password = Str::random(8);
            $validated['password']=bcrypt($password);

            $image_name = time().'_'.$image->getClientOriginalName();
            // $image = Image::make($image)->resize(320, 240);
            // dd($image, $image_name);
            $image_path = $image->storeAs('uploads',$image_name);
            $validated['image'] = $image_path;
            $user_email = $validated['email'];
            $user->update($validated);

            Mail::send('mail',['user'=>$validated['name'], 'password'=>$password], function ($message) use($user_email) {
                $message->to($user_email)->subject('Welcome to CMS');
            });

            // $validated = $request->validated();
            // $validated['password'] = bcrypt($validated['password']);
            // $user->update($validated);
            return redirect()->route('users.index')->with('success','User udated successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error','Something went wrong during user update!' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success','User deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error','Something went wrong during user deletion!' .$e->getMessage());
        }
    }
}
