<!-- resources/views/tasks/partials/task-list.blade.php -->
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
