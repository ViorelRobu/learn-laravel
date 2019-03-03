@extends('layout')

@section('title', 'Testing, Testing, 1, 2, 3')

@section('content')
<div class="col-lg-12 text-center">
    <h1>Testing page</h1>
</div>
@endsection 

@section('page_content')
<hr>
@foreach ($tasks as $task)
    <li>{{ $task }}</li>
@endforeach

@endsection