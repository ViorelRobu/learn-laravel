@extends('layout')

@section('title', "Edit Project")

@section('content')

    <div class="title m-b-md">
        {{ $project->title }}
    </div>

@endsection

@section('page_content')

    <div>
        {{ $project->description }}
    </div>
    <a href="/projects/{{ $project->id }}/edit">
        Edit
    </a>

@endsection 