<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Department;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('components.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('components.courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        try {
            Course::create($request->validated());
            return redirect()->route('courses.index')->with('success','Course created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('courses.index')->with('error','Something went wrong during course creation! ' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $departments = Department::all();
        return view('components.courses.edit', compact('course','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        try {
            $course->update($request->validated());
            return redirect()->route('courses.index')->with('success','Course updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('courses.edit')->with('error','Something went wrong during course update! ' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return redirect()->route('courses.index')->with('success','Course deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('courses.index')->with('error','Something went wrong during course deletion! ' .$e->getMessage());
        }
    }
}
