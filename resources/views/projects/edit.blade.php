@extends('layout')

@section('title', "Edit Project")

@section('content')
<div class="col-lg-12 text-center">
    <h1>Edit Project</h1>
</div>
@endsection

@section('page_content')

<form action="/projects/{{ $project->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="title">Project title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="projectTitle" placeholder="Project title" value="{{ $project->title }}" required>
    </div>
    <div class="form-group">
        <label for="description">Project description</label>
        <textarea class="form-control" name="description" id="description" placeholder="Project description" rows="15" required>{{ $project->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update project</button>
</form>
<br>
@include('errors')
<form action="/projects/{{ $project->id }}" method="post">
    @method('DELETE')
    @csrf
    <div>
        <button class="btn btn-danger" type="submit">Delete Project</button>
    </div>

</form>

@endsection 