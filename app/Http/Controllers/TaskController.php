<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;
class TaskController extends Controller
{
//     public function index()
// {
//     $tasks = Task::all();
//     return view('tasks.index', compact('tasks'));
// }
public function index(Request $request)
{
    $query = Task::query();

    // Search by task name
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter by completion status
    if ($request->filled('completed')) {
        $query->where('completed', $request->completed);
    }

    // Get tasks with pagination
    $tasks = $query->paginate(10); // Adjust the number of tasks per page

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

// Export method
public function export()
{
    return Excel::download(new TasksExport, 'tasks.xlsx');
}

public function search(Request $request)
{
    // Get search query
    $search = $request->input('query');

    // Fetch tasks that match the search query (name or description)
    $tasks = Task::where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->get();

    // Return a partial view containing the filtered tasks
    return view('tasks.partials.task-list', compact('tasks'))->render();
}

    //
}
