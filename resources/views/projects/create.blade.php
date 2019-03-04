@extends('layout')

@section('title', 'Createa New Project')

@section('content')
<div class="col-lg-12 text-center">
    <h1>Create New Project</h1>
</div>
@endsection

@section('page_content')

<form action="/projects" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Project title</label>
        <input type="text" class="form-control {{ $errors->get('title') ? 'is-invalid' : '' }}" name="title" id="title" aria-describedby="projectTitle" placeholder="Project title" value="{{ old('title') }}" required>
    </div>
    <div class="form-group">
        <label for="description">Project description</label>
        <textarea class="form-control {{ $errors->get('description') ? 'is-invalid' : '' }}" name="description" id="description" placeholder="Project description" rows="15" required>{{ old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>

@include('errors')

@endsection 