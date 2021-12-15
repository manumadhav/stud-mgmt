<?php

namespace App\Http\Controllers;

use App\Students;
use App\Teachers;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teachers::all();
        return view('students.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'reporting_teacher_id' => 'required'
        ]);

        Students::create($data);

        return redirect()->route('students.index')->with('success', 'Student has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Students $student
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Students $students
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students, $id)
    {
        $teachers = Teachers::all();
        $student = Students::find($id);
        return view('students.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required'
        ]);
        $students = Students::find($id);
        $students->name = $request->name;
        $students->gender = $request->gender;
        $students->age = $request->age;
        $students->reporting_teacher_id = 1;
        $students->update();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Students::where('id', $id)->delete();
        return back();
    }
}
