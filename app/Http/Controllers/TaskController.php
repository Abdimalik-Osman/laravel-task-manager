<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
}

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'completed' => 'boolean'

    ]);

    Task::create($request->all());
    return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully.');
}
public function edit($id)
{
    $task = Task::find($id);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'completed' => 'boolean'
    ]);

    $task = Task::find($id);
    $task->update($request->all());

    return redirect()->route('tasks.index')
        ->with('success', 'Task updated successfully.');
}

public function destroy($id)
{
    $task = Task::find($id);
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully.');
}

    //
}
