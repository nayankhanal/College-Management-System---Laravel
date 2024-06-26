<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('components.departments.index', compact('departments'));
        // return "Hello from department table";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->cannot('viewAny', Department::class)){
            abort(403);
        }else{
            return view('components.departments.create'); 
        }
        // return "Hello from department create form";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        if ($request->user()->cannot('create', Department::class)) {
            abort(403);
        }else{
            try {
                // dd($request->validated());
                Department::create($request->validated());
                return redirect()->route('departments.index');
            } catch (\Exception $e) {
                return redirect()->route('departments.create')->with('error','Something went wrong during department creation!' .$e->getMessage);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        if (auth()->user()->cannot('update', $department)) {
            abort(403);
        }else{
            return view('components.departments.edit', compact('department'));
        }
        // return "Hello from department edit form";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        if ($request->user()->cannot('update', $department)) {
            abort(403);
        }else{
            try {
                $department->update($request->validated());
                return redirect()->route('departments.index');
            } catch (\Exception $e) {
                return redirect()->route('departments.edit')->with('error','Something went wrong during update!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if (auth()->user()->cannot('delete', $department)) {
            abort(403);
        }else{
            try {
                $department->delete();
                return redirect()->route('departments.index');
            } catch (\Exception $e) {
                return redirect()->route('departments.index')->with('error','Something went wrong during deletion!');
            }
        }
    }
}
