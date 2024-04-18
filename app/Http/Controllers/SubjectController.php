<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Http\Requests\SubjectRequest;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('components.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('components.subjects.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        try {
            Subject::create($request->validated());
            return redirect()->route('subjects.index')->with('success','Subject created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('subjects.index')->with('error','Something went wrong during subject creation! ' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $courses = Course::all();
        return view('components.subjects.edit', compact('subject','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        try {
            $subject->update($request->validated());
            return redirect()->route('subjects.index')->with('success','Subject updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('subjects.edit')->with('error','Something went wrong during subject update! ' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
            return redirect()->route('subjects.index')->with('success','Subject updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('subjects.index')->with('error','Something went wrong during subject deletion! ' .$e->getMessage());
        }

    }
}
