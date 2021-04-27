<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Schedule;
use App\Http\Requests\MaterialCreate;
use Auth;

class MaterialController extends Controller
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
        $data['schedules'] = Auth::guard('teacher')->user()->schedules;
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
        return redirect('material')->with('message', 'A Class Materi With Subject '.$request->title.' Has Created');
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
    public function edit(Material $material)
    {
        $data['material'] = $material;
        $data['schedules'] = Schedule::all();
        return view('material.edit', $data);
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material = $material;
        $input      = $request->all();
        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $fileName   = $file->getClientOriginalName();
            $file->move("material_file", $fileName);
            $input['file'] = $fileName;
        } else {
            $input['file'] = $material->file;
        }

        $material->update($input);
        return redirect('material')->with('message', 'A Material With Name '.$material->name.' Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material = $material;
        $material->delete();
        return redirect('material')->with('message', 'Material With Name '.$material->title.' Has Deleted');
    }

    public function download($file)
    {
        $pathToFile = public_path("material_file/".$file);
        return response()->download($pathToFile);
    }


    public function dashboard()
    {
        return view('teacher.dashboard');
    }
}
