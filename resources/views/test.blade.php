@extends('layout')

@section('title', 'Testing, Testing, 1, 2, 3')

@section('content')
<div class="title m-b-md">
    Testing page
</div>
@endsection 

@section('page_content')
<hr>
@foreach ($tasks as $task)
    <li>{{ $task }}</li>
@endforeach

@endsection