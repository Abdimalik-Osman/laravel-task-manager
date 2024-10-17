

<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Tasks List</h1>

        <!-- Filter Form -->
        <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by task name" value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="completed" class="form-control">
                        <option value="">-- Filter by status --</option>
                        <option value="1" {{ request('completed') == '1' ? 'selected' : '' }}>Completed</option>
                        <option value="0" {{ request('completed') == '0' ? 'selected' : '' }}>Not Completed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
                    <a href="{{ route('tasks.export') }}" class="btn btn-success mb-4">Export to Excel</a>

                </div>
            </div>
        </form>

        <!-- Task List Table -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $tasks->links() }}
    </div>
@endsection
