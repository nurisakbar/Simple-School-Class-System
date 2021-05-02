<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;
use App\Http\Requests\AcademicRequest;

class AcademicController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $data['academic'] = AcademicYear::all();
        return view('academic.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcademicRequest $request)
    {
        AcademicYear::create($request->all());
        return redirect('academic')->with('message', 'A academic has been created successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYear $academic)
    {
        $data['academic'] = $academic;
        return view('academic.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(AcademicRequest $request, AcademicYear $academic)
    {
        $academic = $academic;
        $academic->update($request->all());
        return redirect('academic')->with('message', 'A academic With Name '.$academic->year.' Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYear $academic)
    {
        $academic = $academic;
        $academic->delete();
        return redirect('academic')->with('message', 'academic With Name '.$academic->year.' Has Deleted');
    }
}
