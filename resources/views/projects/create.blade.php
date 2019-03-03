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
        <input type="text" class="form-control {{ $errors->any() ? 'is-invalid' : '' }}" name="title" id="title" aria-describedby="projectTitle" placeholder="Project title" value="{{ old('title') }}" required>
    </div>
    <div class="form-group">
        <label for="description">Project description</label>
        <textarea class="form-control {{ $errors->any() ? 'is-invalid' : '' }}" name="description" id="description" placeholder="Project description" required>{{ old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection 