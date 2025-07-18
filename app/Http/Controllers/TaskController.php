<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function __construct(protected TaskService $taskService)
    {
    }

    public function index() 
    {
        $tasks = Task::ownedBy(Auth::id())->latest()->paginate(10);

        return view('task.index', compact('tasks'));
    }

    public function create() 
    {
        return view('task.create');
    }

    public function store(StoreTaskRequest $request) 
    {
        $this->taskService->create($request->validated());
        
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Task has been created successfully'
        ]);
    }
    
    public function edit(Task $task) 
    {
        $this->authorize('update', $task);

        return view('task.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task) 
    {
        $this->authorize('update', $task);
        
        $this->taskService->update($task, $request->validated());
        
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Task has been updated successfully'
        ]);
    }

    public function show(Task $task) 
    {
        $this->authorize('view', $task);

        return view('task.show', compact('task'));
    }

    public function destroy(Task $task) 
    {
        $this->authorize('delete', $task);

        $this->taskService->delete($task);
        
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Task has been deleted successfully'
        ]);
    }
}
