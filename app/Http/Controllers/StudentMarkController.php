<?php

namespace App\Http\Controllers;

use App\StudentMark;
use App\Students;
use App\Terms;
use Illuminate\Http\Request;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentMarkDetails = StudentMark::paginate(10);
        return view('studentMark.index', compact('studentMarkDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        $terms = Terms::all();
        return view('studentMark.create', compact('terms', 'students'));
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
            'student_id' => 'required',
            'term_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required'
        ]);
        $data['total_mark'] = $request->maths + $request->science + $request->history;

        StudentMark::create($data);

        return redirect()->route('studentMark.index')->with('success', 'Student mark details has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\StudentMark $studentMark
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMark $studentMark)
    {
        $students = Students::all();
        $terms = Terms::all();
        return view('studentMark.edit', compact('students', 'studentMark', 'terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\StudentMark $studentMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentMark $studentMark)
    {
        $request->validate([
            'term_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required'
        ]);
        $total_mark = $request->maths + $request->science + $request->history;
        $studentMark->term_id = $request->term_id;
        $studentMark->maths = $request->maths;
        $studentMark->science = $request->science;
        $studentMark->history = $request->history;
        $studentMark->total_mark = $total_mark;
        $studentMark->save();
        return redirect()->route('studentMark.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\StudentMark $studentMark
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(StudentMark $studentMark)
    {
        $studentMark->delete();
        return back();
    }
}
