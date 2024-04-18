<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('components.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        foreach($users as $user){
            if($user->role === 'student'){
                $students[] = $user;
            }
        }

        $courses = Course::all();
        return view('components.students.create', compact('students','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        // dd($request->validated());
        // $student = new Student();
        // $columns = $student->getConnection()->getSchemaBuilder()->getColumnListing($student->getTable());
        // dd($columns);
        try {
            Student::create($request->validated());
            return redirect()->route('students.index')->with('success','Student successfully assigned!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('students.create')->with('error','Something went wrong during assigning student! ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $students = Student::all();
        $courses = Course::all();
        return view('components.students.edit', compact('student','students','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        try {
            $student->update($request->validated());
            return redirect()->route('students.index')->with('success','Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->back()->with('success','Sucessfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during deletion!');
        }
    }
}
