@extends('layout')

@section('title', 'Createa New Project')

@section('content')
<div class="title m-b-md">
    Create New Project
</div>
@endsection

@section('page_content')

<form action="/projects" method="post">
    {{ csrf_field() }}
    <div>
        <input type="text" name="title" id="" placeholder="Project title" value="{{ old('title') }}">
    </div>
    <div>
        <textarea name="description" id="" cols="30" rows="10" placeholder="Project description">{{ old('description') }}</textarea>
    </div>
    <div>
        <button type="submit">Create Project</button>
    </div>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</form>

@endsection 