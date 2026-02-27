<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // return with inertia
        return inertia('Task/Index' , [
            'tasks' => Task::all()
        ]);
    }

    public function create()
    {
        // return with inertia
        return inertia('Task/Create');

    }
    
    public function store(Request $request)
    {
        // return with inertia
        // return inertia('Task/Create');
        $request
            ->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            Task::create($request->all()
            
            );
            return redirect()->route('task.index'); 
    }

    public function show(Task $task)
    {
        // return with inertia
        return inertia('Task/Show', [
            'task' => $task
        ]);
    }

    public function edit(Task $task)
    {
        // return with inertia
        return inertia('Task/Edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        // return with inertia
        $task->update($request->all());
        return redirect()->route('task.index');
    }

    public function destroy(Task $task)
    {
        // return with inertia
        $task->delete();
        return redirect()->route('task.index');
    }
    
}



