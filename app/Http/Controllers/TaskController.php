<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::ownedBy(Auth::id())->latest()->paginate(10);

        return view('task.index', compact('tasks'));
    }

    public function create() {
        return view('task.create');
    }

    public function store(Request $request) {

        $taskData = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['not started', 'ongoing', 'complete'])]
        ]);

        $task = Task::create($taskData + ['created_by' => Auth::id()]);
        
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Task has been created successfully'
        ]);
    }
    
    public function edit($taskId) {
        $task = Task::findOrFail($taskId);

        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $taskId) {
        
        $taskData = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['not started', 'ongoing', 'complete'])]
        ]);

        $task = Task::findOrFail($taskId);

        $updatedTask = $task->update($taskData);
        
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Task has been updated successfully'
        ]);
    }

    public function show($taskId) {
        
        $task = Task::findOrFail($taskId);

        return view('task.show', compact('task'));
    }

    public function destroy($taskId) {
        
        $task = Task::findOrFail($taskId);
        
        $task->delete();
        
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Task has been deleted successfully'
        ]);
    }
}
