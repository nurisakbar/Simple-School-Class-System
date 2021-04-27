<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Schedule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $data['tasks'] = Task::all();
        return view('task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['schedules'] = Schedule::all();
        return view('task.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect('task')->with('A Task has been created successfull!');
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
    public function edit(task $task)
    {
        $data['task'] = $task;
        $data['schedules'] = Schedule::all();
        return view('task.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task = $task;
        $task->update($request->all());
        return redirect('task')->with('message', 'A Task With Name '.$task->subject.' Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task = $task;
        $task->delete();
        return redirect('task')->with('message', 'Task With Name '.$task->subject.' Has Deleted');
    }


    public function dashboard()
    {
        return view('teacher.dashboard');
    }
}
