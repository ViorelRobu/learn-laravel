@extends('layout')

@section('title', 'Projects')

@section('content')
<div class="col-md-12 text-center">
    <h1>All Projects</h1>
</div>
@endsection

@section('page_content')
        @foreach ($projects as $project)
            <div>
                <a href="/projects/{{ $project->id }}">
                    {{ $project->title }}
                </a>
            </div>
        @endforeach

        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
@endsection 