@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Task</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Task Name</label>
            <input type="text" name="name" value="{{ $task->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
