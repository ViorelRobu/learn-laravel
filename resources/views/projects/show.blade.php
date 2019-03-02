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
                <li>{{ $task->description }}</li>
            @endforeach
        </div>
    @endif
    <hr>
    <a href="/projects/{{ $project->id }}/edit">
        Edit
    </a>

@endsection 