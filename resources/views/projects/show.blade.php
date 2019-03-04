@extends('layout')

@section('title', 'Edit project')


@section('content')

    <div class="col-lg-12 text-center">
        <h1>{{ $project->title }}</h1>
    </div>

@endsection

@section('page_content')

    <hr>
    <div>
        {{ $project->description }}
    </div>
    @if ($project->tasks->count())
        <hr>
        <div>
            @foreach ($project->tasks as $task)
                <div>
                    <form class="{{ $task->completed ? 'is-active' : '' }}" action="/completed-tasks/{{ $task->id }}" method="post">

                        @if ($task->completed)
                            @method('DELETE')
                        @endif

                        @csrf
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </form>
                </div>
            @endforeach
        </div>
    @endif
    <hr>
    <a class="btn btn-primary" href="/projects/{{ $project->id }}/edit">
        Edit
    </a>

    {{-- add a new task --}}
    <hr>
    <div class="panel panel-default">
        <form action="/projects/{{ $project->id }}/tasks" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="description">New Task</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="taskDescription" placeholder="Task description" required>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Task</button>
</form>

@include('errors')

@endsection 