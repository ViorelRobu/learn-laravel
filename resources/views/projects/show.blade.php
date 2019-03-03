@extends('layout')

@section('title', "Edit Project")

@section('content')

    <div class="title m-b-md">
        {{ $project->title }}
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
                    <form action="/tasks/{{ $task->id }}" method="post">
                        @method('PATCH')
                        @csrf
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </form>
                </div>
            @endforeach
        </div>
    @endif
    <hr>
    <a href="/projects/{{ $project->id }}/edit">
        Edit
    </a>

@endsection 