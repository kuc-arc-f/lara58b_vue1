<?php
//タスク

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

//
class TasksController extends Controller
{
    /**************************************
     *
     **************************************/
    public function index()
    {
        return view('tasks/index')->with('tasks', null );
    }    
    /**************************************
     *
     **************************************/
    public function create()
    {
        return view('tasks/create')->with('task', null );        

    }
    /**************************************
     *
     **************************************/    
    public function store(Request $request)
    {
//debug_dump( $request->all() );
//exit();
/*
        $task = new Task();
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');
*/
    }
    /**************************************
     *
     **************************************/
    public function show($id)
    {
        return view('tasks/show')->with('task_id', $id );
    }
    /**************************************
     *
     **************************************/
    public function edit($id)
    {
        return view('tasks/edit')->with('task_id', $id );
    }
    /**************************************
     *
     **************************************/
    public function update(Request $request, $id)
    {
        /*
        $task = Task::find($id);
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');
        */
    }
    /**************************************
     *
     **************************************/
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }    


}
