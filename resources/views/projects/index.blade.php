@extends('layout')

@section('title', 'Projects')

@section('content')
<div class="title m-b-md">
    Project
</div>
@endsection

@section('page_content')
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="/projects/{{ $project->id }}">
                    {{ $project->title }}
                </a>
                <hr>
                {{ $project->description }}
            </li>
            <br>
        @endforeach
    </ul>
@endsection 