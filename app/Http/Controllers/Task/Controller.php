<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return $this->sendResponse(Task::all(), 'Tasks retrieved successfully.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $task = Task::create($input);

        return $this->sendResponse($task, 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }

        return $this->sendResponse($task, 'Task retrieved successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return $this->sendResponse($task, 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $this->sendResponse($task, 'Task deleted successfully.');
    }
}
