@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-light p-4 shadow-sm rounded">
            @csrf
            @method('PUT')

            <!-- Task Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Task Name</label>
                <input type="text" name="name" value="{{ $task->name }}" class="form-control" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
            </div>

            <!-- Completed Checkbox -->
            <div class="form-check mb-3">
                <!-- Hidden field to submit value if checkbox is unchecked -->
                <input type="hidden" name="completed" value="0">
                <input type="checkbox" name="completed" class="form-check-input" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                <label for="completed" class="form-check-label">Completed</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
