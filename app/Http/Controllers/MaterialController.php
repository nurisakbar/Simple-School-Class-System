<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Schedule;
use App\Http\Requests\MaterialCreate;
use Auth;

class materialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $data['materials'] = Material::all();
        return view('material.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['schedules'] = Schedule::all();
        return view('material.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialCreate $request)
    {
        $input      = $request->all();
        $file       = $request->file('file');
        $fileName   = $file->getClientOriginalName();
        $file->move("material_file", $fileName);
        $input['file'] = $fileName;
        Material::create($input);
        return redirect('material');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $data['teachingTime']   = $this->teachingTime;
        $data['rooms']          = Room::pluck('name', 'id');
        $data['courses']        = Course::pluck('name', 'id');
        $data['class']          = StudentClass::pluck('name', 'id');
        $data['teacher']        = $teacher;
        return view('teacher.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    public function dashboard()
    {
        return view('teacher.dashboard');
    }
}
