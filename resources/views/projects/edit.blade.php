@extends('layout')

@section('title', "Edit Project")

@section('content')
<div class="title m-b-md">
    Edit a Project
</div>
@endsection

@section('page_content')

<form action="/projects/{{ $project->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div>
        <input type="text" name="title" id="" placeholder="Project title" value="{{ $project->title }}">
    </div>
    <div>
        <textarea name="description" id="" cols="30" rows="10" placeholder="Project description">{{ $project->description }}</textarea>
    </div>
    <div>
        <button type="submit">Update Project</button>
    </div>

</form>

<form action="/projects/{{ $project->id }}" method="post">
    @method('DELETE');
    @csrf
    <div>
        <button type="submit">Delete Project</button>
    </div>

</form>

@endsection 