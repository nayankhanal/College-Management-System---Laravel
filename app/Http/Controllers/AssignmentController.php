<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\Teacher;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('components.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('components.assignments.create', compact('students','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssignmentRequest $request)
    {
        try {
            Assignment::create($request->validated());
            return redirect()->route('assignment.index')->with('success','Successfully given assignment!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('assignments.create')->with('error','Something went wrong during giving assignment! ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('components.assignments.edit', compact('assignment','students','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignmentRequest $request, Assignment $assignment)
    {
        try {
            $assignment->update($request->validated());
            return redirect()->route('assignments.index')->with('success','Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        try {
            $assignment->delete();
            return redirect()->back()->with('success','Sucessfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during deletion!');
        }
    }
}
