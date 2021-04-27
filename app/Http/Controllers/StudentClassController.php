<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Http\Requests\StudentClassCreate;

class StudentClassController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    
    public function index()
    {
        $data['classes'] = StudentClass::all();
        return view('student-class.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentClassCreate $request)
    {
        StudentClass::create($request->all());
        return redirect('class')->with('message', 'A Class With name '.$request->name.' Has Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass, $id)
    {
        $data['class'] = $studentClass->find($id);
        return view('student-class.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $student, $id)
    {
        $data['class'] = $student->find($id);
        return view('student-class.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentClassCreate $request, StudentClass $studentClass, $id)
    {
        $studentClass = $studentClass->find($id);
        $studentClass->update($request->all());
        return redirect('class')->with('message', 'A Class With Name '.$studentClass->name.' Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $studentClass, $id)
    {
        $row = $studentClass->find($id);
        $row->delete();
        return redirect('class')->with('message', 'Class With Name '.$row->name.' Has Deleted');
    }
}
