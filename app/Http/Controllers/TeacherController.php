<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\TeacherRequest;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('components.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        foreach($users as $user){
            if($user->role === 'teacher'){
                $teachers[] = $user;
            }
        }

        $departments = Department::all();
        return view('components.teachers.create', compact('teachers','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        try {
            Teacher::create($request->validated());
            return redirect()->route('teachers.index')->with('success','Teacher successfully assigned!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('teachers.create')->with('error','Something went wrong during assigning teacher! ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $teachers = Teacher::all();
        $departments = Department::all();
        return view('components.teachers.edit', compact('teacher','teachers','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        try {
            $teacher->update($request->validated());
            return redirect()->route('teachers.index')->with('success','Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            return redirect()->back()->with('success','Sucessfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during deletion!');
        }
    }
}
