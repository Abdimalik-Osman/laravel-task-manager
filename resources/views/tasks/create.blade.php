@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="bg-light p-4 shadow-sm rounded">
            @csrf

            <!-- Task Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Task Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <!-- Description Field -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <!-- Completed Checkbox -->
            <div class="form-check mb-3">
                <!-- Hidden field to ensure value is sent if checkbox is unchecked -->
                <input type="hidden" name="completed" value="0">
                <input type="checkbox" name="completed" id="completed" class="form-check-input" value="1">
                <label for="completed" class="form-check-label">Completed</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
