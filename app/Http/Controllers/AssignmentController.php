<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\Course;
use App\Http\Requests\AssignmentRequest;

use Html2Text\Html2Text;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->cannot('viewAny', Assignment::class)){
            abort(403);
        }

        $role = auth()->user()->role;

        switch ($role) {
            case 'admin':
                $assignments = Assignment::all();
                return view('components.assignments.index', compact('assignments'));
                // break;
            
            case 'teacher':
                $assignments = Assignment::where('teacher_id',auth()->user()->teacher->id)->get();
                return view('components.assignments.index', compact('assignments'));
                // break;

            case 'student':
                $student = Student::where('user_id', auth()->user()->id)->pluck('id')->first();

                $enrollments = Enrollment::where('student_id', $student)->pluck('course_id')->all();
                
                // $courses = Course::where('id', $enrollments)->pluck('id')->all();
                $courses = Course::whereIn('id', $enrollments)->pluck('id')->all();
                
                // $subjects = Subject::whereIn('course_id', $courses)->pluck('course_id')->all();
                $subjects = Subject::whereIn('course_id', $courses)->pluck('id')->all();
                // dd($subjects);
                $assignments = Assignment::whereIn('subject_id', $subjects)->get();
                
                return view('components.assignments.index', compact('assignments'));
                // break;

            default:
                abort(403);
                break;
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = auth()->user()->teacher->department->courses->pluck('subjects')->flatten();
        return view('components.assignments.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssignmentRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['teacher_id'] = auth()->user()->teacher->id;
            Assignment::create($validated);
            return redirect()->route('assignments.index')->with('success','Successfully given assignment!');
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
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('components.assignments.edit', compact('assignment','subjects','teachers'));
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
