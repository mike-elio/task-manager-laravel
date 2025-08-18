@extends('layouts.app')

@section('content')
    <h2 class="mb-4">All Tasks</h2>

    <!-- Search -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-3 d-flex">
        <input type="text" name="search" value="{{ $search }}" class="form-control me-2" placeholder="Search tasks">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($tasks->isEmpty())
        <div class="alert alert-warning">No tasks found.</div>
    @else
        <div class="list-group">
            @foreach($tasks as $task)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">{{ $task->name }}</h5>
                        <small>{{ $task->description }}</small>
                    </div>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
